<?php

use App\Http\Controllers\Web\GroupCategoryController;
use App\Http\Controllers\Web\GroupController;
use Illuminate\Support\Facades\Route;

Route::get('/',             [GroupController::class, 'index'])->name('home');
Route::get('/group/create', [GroupController::class, 'create'])->name('group.create');
Route::get('/group/{slug}', [GroupController::class, 'show'])->name('group.show');

Route::get('/categories',   [GroupCategoryController::class, 'index'])->name('group.categories');