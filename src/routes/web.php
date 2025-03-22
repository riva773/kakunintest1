<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

Route::get('/', [ContactController::class, 'create']);
ROute::post('/confirm', [ContactController::class, 'confirm']);