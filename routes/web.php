<?php

use App\Http\Controllers\Web\GroupCategoryController;
use App\Http\Controllers\Web\GroupController;
use Illuminate\Support\Facades\Route;

Route::get('/',           [GroupController::class, 'index'])->name('home');
Route::get('/categories', [GroupCategoryController::class, 'index'])->name('group.categories');