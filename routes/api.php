<?php

use App\Http\Controllers\Api\GroupController;
use Illuminate\Support\Facades\Route;

Route::get('/groups/invite-code/{inviteCode}/validate', [GroupController::class, 'validateInviteCode']);
Route::post('/groups', [GroupController::class, 'store']);