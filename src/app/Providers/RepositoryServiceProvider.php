<?php
declare(strict_types=1);

namespace App\Providers;

use App\Adapters\Task\TaskRepository;
use Illuminate\Support\ServiceProvider;
use Todo\Task\TaskRepositoryInterface;

class RepositoryServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->app->singleton(TaskRepositoryInterface::class, TaskRepository::class);
    }
}
