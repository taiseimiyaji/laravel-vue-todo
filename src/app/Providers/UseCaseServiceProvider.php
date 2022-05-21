<?php
declare(strict_types=1);

namespace App\Providers;

use Carbon\Laravel\ServiceProvider;
use Todo\Task\Query\GetAllTask\GetAllTask;
use Todo\Task\Query\GetAllTask\GetAllTaskInterface;

class UseCaseServiceProvider extends ServiceProvider
{
    public function boot(): void{
        $this->app->singleton(GetAllTaskInterface::class, GetAllTask::class);
    }
}