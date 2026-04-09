<?php

namespace App\Http\Controllers;

use App\Services\ScriptGeneratorService;
use App\Models\Script;
use Illuminate\Http\Request;

class ScriptController extends Controller
{
    public function __construct(private ScriptGeneratorService $generator) {}

    public function generate(Request $request)
    {
        $validated = $request->validate([
            'business_type' => 'required|string|max:100',
            'location'      => 'required|string|max:100',
            'count'         => 'sometimes|integer|min:1|max:10',
        ]);

        $scripts = $this->generator->generate(
            $validated['business_type'],
            $validated['location'],
            $validated['count'] ?? 5
        );

        // Save to DB
        $saved = collect($scripts)->map(function ($s) use ($validated) {
            return Script::create([
                'business_type' => $validated['business_type'],
                'location'      => $validated['location'],
                'platform'      => $s['platform'],
                'hook'          => $s['hook'],
                'body'          => $s['body'],
                'cta'           => $s['cta'],
                'overlay_texts' => $s['overlay_texts'],
                'peira_link'    => $s['peira_link'],
            ]);
        });

        return response()->json([
            'success' => true,
            'count'   => $saved->count(),
            'scripts' => $saved,
        ]);
    }

    public function index(Request $request)
    {
        $scripts = Script::query()
            ->when($request->business_type, fn($q, $v) => $q->where('business_type', $v))
            ->when($request->location,      fn($q, $v) => $q->where('location', $v))
            ->latest()
            ->paginate(20);

        return response()->json($scripts);
    }

    public function export(Script $script)
    {
        return response()->json([
            'text' => implode("\n\n", [
                "HOOK: {$script->hook}",
                "BODY: {$script->body}",
                "CTA:  {$script->cta}",
                "OVERLAYS: " . implode(' | ', $script->overlay_texts),
                "LINK: {$script->peira_link}",
            ]),
            'json' => $script,
        ]);
    }


    public function dashboard()
    {
        return view('scripts.index');
    }
}