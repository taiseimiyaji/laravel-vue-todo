<?php

use App\Http\Task\Command\CreateTask\CreateTaskAction;
use App\Http\Task\Query\GetAllStatus\GetAllStatusAction;
use App\Http\Task\Query\GetAllTask\GetAllTaskAction;
use App\Http\Task\Query\GetTask\GetTaskQueryAction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('task', CreateTaskAction::class);
Route::get('task', GetAllTaskAction::class);
Route::get('status', GetAllStatusAction::class);
Route::get('task/{id}', GetTaskQueryAction::class);
