<?php

use App\Http\Controllers\Web\GroupCategoryController;
use App\Http\Controllers\Web\GroupController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $locale = request()->getPreferredLanguage(['en', 'pt', 'es']);
    return redirect("/{$locale}");
});

Route::prefix('{locale}')->middleware('setLocale')->group(function () {

    Route::get('/', [GroupController::class, 'index'])->name('home');

    Route::prefix('groups')->group(function () {
        Route::get('/create',       [GroupController::class, 'create'])->name('groups.create');
        Route::get('/{slug}',       [GroupController::class, 'show'])->name('groups.show');
        Route::post('/{slug}/join', [GroupController::class, 'join'])->name('groups.join');
    });

    Route::get('/categories', [GroupCategoryController::class, 'index'])->name('groups.categories');

});