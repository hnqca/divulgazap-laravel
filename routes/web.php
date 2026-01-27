<?php

use App\Models\Group;
use Illuminate\Support\Facades\Route;

Route::get('/', function(){

    echo '<pre>';
    print_r(Group::all());
});