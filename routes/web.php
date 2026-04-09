<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ScriptController;



Route::get('/', [ScriptController::class, 'dashboard']);