<?php
declare(strict_types=1);

namespace App\Providers;

use App\Adapters\Task\TaskFactory;
use Illuminate\Support\ServiceProvider;
use Todo\Task\TaskFactoryInterface;

class FactoryServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->app->singleton(TaskFactoryInterface::class, TaskFactory::class);
    }
}
