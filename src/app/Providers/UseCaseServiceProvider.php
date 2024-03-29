<?php
declare(strict_types=1);

namespace App\Providers;

use App\Adapters\Task\Query\GetAllStatus\GetAllStatus;
use App\Adapters\Task\Query\GetAllTask;
use Carbon\Laravel\ServiceProvider;
use Todo\Task\Command\CreateTask\CreateTask;
use Todo\Task\Command\CreateTask\CreateTaskInterface;
use Todo\Task\Command\DeleteTask\DeleteTask;
use Todo\Task\Command\DeleteTask\DeleteTaskInterface;
use Todo\Task\Command\UpdateTask\UpdateTask;
use Todo\Task\Command\UpdateTask\UpdateTaskInterface;
use Todo\Task\Query\GetAllStatus\GetAllStatusInterface;
use Todo\Task\Query\GetAllTask\GetAllTaskInterface;
use Todo\Task\Query\GetTaskQuery\GetTaskQuery;
use Todo\Task\Query\GetTaskQuery\GetTaskQueryInterface;
use Todo\Task\Sort\UpdateSort\UpdateSort;
use Todo\Task\Sort\UpdateSort\UpdateSortInterface;

class UseCaseServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->app->singleton(GetAllTaskInterface::class, GetAllTask::class);
        $this->app->singleton(CreateTaskInterface::class, CreateTask::class);
        $this->app->singleton(UpdateTaskInterface::class, UpdateTask::class);
        $this->app->singleton(DeleteTaskInterface::class, DeleteTask::class);
        $this->app->singleton(GetTaskQueryInterface::class, GetTaskQuery::class);
        $this->app->singleton(GetAllStatusInterface::class, GetAllStatus::class);
        $this->app->singleton(UpdateSortInterface::class, UpdateSort::class);
    }
}
