<?php
declare(strict_types=1);

namespace Tests\Adapters\Task;

use App\Adapters\Task\TaskRepository;
use Tests\TestCase;
use Todo\Task\TaskRepositoryInterface;

class TaskRepositoryTest extends TestCase
{
    public function test__construct(): void
    {
        $repository = $this->app->make(TaskRepositoryInterface::class);
        $this->assertInstanceOf(TaskRepository::class, $repository);
    }
}
