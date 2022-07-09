<?php
declare(strict_types=1);

namespace App\Http\Task\Command\CreateTask;

use Todo\Task\ValueObject\Task;
use Todo\Task\Command\CreateTask\CreateTaskOutputPort;

class CreateTaskResponse implements CreateTaskOutputPort
{
    private Task $task;

    public function output(Task $task): void
    {
        $this->task = $task;
    }

    public function task(): Task
    {
        return $this->task;
    }
}