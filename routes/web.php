<?php

use App\Http\Controllers\Web\GroupController;
use Illuminate\Support\Facades\Route;

Route::get('/', [GroupController::class, 'index'])->name('home');