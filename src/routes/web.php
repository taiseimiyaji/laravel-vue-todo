<?php

use Illuminate\Support\Facades\Route;
use App\Http\Task\Query\GetAllTask\GetAllTaskAction;
use App\Http\Task\Command\CreateTask\CreateTaskAction;

Route::get('/', function () {
    return view('index');
});

Route::get('/task/list', GetAllTaskAction::class);

Route::post('/task/list', GetAllTaskAction::class);

Route::post('/task/add', CreateTaskAction::class);
Route::post('/task/send', CreateTaskAction::class);
