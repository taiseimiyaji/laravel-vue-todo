<?php

use App\Http\Task\Query\GetAllTask\GetAllTaskAction;
use Illuminate\Support\Facades\Route;
Route::get('/', function () {
    return view('index');
});

Route::get('/task/list', GetAllTaskAction::class);