<?php
declare(strict_types=1);

namespace Todo\Task\Query\GetAllTask;

use App\Models\Task;
use Todo\Task\ValueObject\TaskCollection;
use Todo\Task\Query\GetAllTask\GetAllTaskInterface;

class GetAllTask implements GetAllTaskInterface
{
    private $task;

    public function __construct(Task $task)
    {
        $this->task = $task;
    }
    public function findAll(): TaskCollection
    {
        $taskModel = $this->task->newQuery()->get();
        return TaskCollection::fromArray($taskModel->toArray());
    }
}
