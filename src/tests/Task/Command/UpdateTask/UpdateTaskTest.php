<?php
declare(strict_types=1);

namespace Tests\Task\Command\UpdateTask;

use Psr\Log\LoggerInterface;
use Tests\TestCase;
use Todo\Task\Command\UpdateTask\UpdateTask;
use Todo\Task\Command\UpdateTask\UpdateTaskInterface;
use Todo\Task\TaskRepositoryInterface;

class UpdateTaskTest extends TestCase
{
    private UpdateTaskInterface $updateTask;

    private TaskRepositoryInterface $repository;

    private LoggerInterface $logger;

    public function test__construct(): void
    {
        $useCase = $this->app->make(UpdateTaskInterface::class);
        $this->app->instance(UpdateTask::class, $useCase);
    }
}
