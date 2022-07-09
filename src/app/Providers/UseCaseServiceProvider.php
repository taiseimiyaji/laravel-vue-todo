<?php
declare(strict_types=1);

namespace App\Providers;

use App\Http\Task\Command\CreateTask\CreateTaskAction;
use Carbon\Laravel\ServiceProvider;
use Todo\Task\Command\CreateTask\CreateTaskInterface;
use Todo\Task\Query\GetAllTask\GetAllTask;
use Todo\Task\Query\GetAllTask\GetAllTaskInterface;

class UseCaseServiceProvider extends ServiceProvider
{
    public function boot(): void{
        $this->app->singleton(GetAllTaskInterface::class, GetAllTask::class);
        $this->app->singleton(CreateTaskInterface::class, CreateTaskAction::class);

    }
}