<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class ScriptGeneratorService
{
    public function generate(string $businessType, string $location, int $count = 5): array
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . env('GROQ_API_KEY'),
            'Content-Type'  => 'application/json',
        ])->post('https://api.groq.com/openai/v1/chat/completions', [
            'model' => 'llama-3.3-70b-versatile',
            'messages' => [
                ['role' => 'system', 'content' => $this->systemPrompt()],
                ['role' => 'user',   'content' => $this->buildPrompt($businessType, $location, $count)],
            ],
            'temperature' => 0.85,
            'response_format' => ['type' => 'json_object'],
        ]);

        $data = json_decode($response->json('choices.0.message.content'), true);
        return $data['scripts'] ?? [];
    }

    private function systemPrompt(): string
    {
        return <<<PROMPT
You are PeiraOS — a marketing engine that creates short video scripts
for Nigerian small businesses. Your scripts must:
- Sound natural in Nigerian English (warm, confident, relatable)
- Reference real local context (city, culture, hustle)
- Be 30–60 seconds when read aloud (approx 80–130 words)
- End with a clear CTA linking to Peira-Services
- Return ONLY valid JSON, no markdown

JSON structure:
{
  "scripts": [
    {
      "platform": "tiktok|reels|whatsapp",
      "hook": "...",
      "body": "...",
      "cta": "...",
      "overlay_texts": ["text1", "text2", "text3"],
      "peira_link": "https://wa.me/2348012345678"
    }
  ]
}
PROMPT;
    }

    private function buildPrompt(string $businessType, string $location, int $count): string
    {
        return <<<PROMPT
Generate {$count} short video scripts for a {$businessType} business in {$location}, Nigeria.
Vary the platforms across tiktok, reels, and whatsapp.
Make each script unique — different hooks, angles, and energy levels.
Keep it real, local, and punchy. Nigerian customers should feel seen.
PROMPT;
    }
}