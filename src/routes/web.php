<?php

use App\Http\Task\Command\DeleteTask\DeleteTaskAction;
use App\Http\Task\Query\GetTask\GetTaskQueryAction;
use Illuminate\Support\Facades\Route;
use App\Http\Task\Query\GetAllTask\GetAllTaskAction;
use App\Http\Task\Command\CreateTask\CreateTaskAction;


Route::get('/', static function () {
    return view('index');
});


Route::get('/task/{id}', GetTaskQueryAction::class);


Route::post('delete/{id}', DeleteTaskAction::class);

