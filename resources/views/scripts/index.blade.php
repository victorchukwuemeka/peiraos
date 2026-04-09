@extends('layouts.app')

@section('content')

{{-- Generator Form --}}
<div class="bg-white rounded-2xl border border-gray-200 p-6 mb-8">
    <h1 class="text-2xl font-semibold text-gray-800 mb-1">Generate Video Scripts</h1>
    <p class="text-sm text-gray-400 mb-6">Enter a business type and location to get ready-to-use scripts</p>

    <form id="generateForm" class="grid grid-cols-1 md:grid-cols-3 gap-4">
        @csrf
        <div>
            <label class="block text-sm text-gray-500 mb-1">Business Type</label>
            <input type="text" id="businessType" placeholder="e.g. restaurant, salon"
                class="w-full border border-gray-200 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-green-500">
        </div>
        <div>
            <label class="block text-sm text-gray-500 mb-1">Location</label>
            <input type="text" id="location" placeholder="e.g. Lagos, Abuja"
                class="w-full border border-gray-200 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-green-500">
        </div>
        <div class="flex items-end">
            <button type="submit" id="generateBtn"
                class="w-full bg-green-600 hover:bg-green-700 text-white text-sm font-medium px-4 py-2.5 rounded-lg transition">
                Generate Scripts
            </button>
        </div>
    </form>
</div>

{{-- Loading State --}}
<div id="loading" class="hidden text-center py-12">
    <div class="inline-block w-8 h-8 border-4 border-green-500 border-t-transparent rounded-full animate-spin"></div>
    <p class="text-sm text-gray-400 mt-3">Generating your scripts...</p>
</div>

{{-- Scripts Output --}}
<div id="scriptsOutput" class="space-y-4"></div>

@endsection