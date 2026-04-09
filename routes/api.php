<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ScriptController;

Route::prefix('scripts')->group(function () {
    Route::post('generate', [ScriptController::class, 'generate']);
    Route::get('/',         [ScriptController::class, 'index']);
    Route::get('{script}/export', [ScriptController::class, 'export']);
});