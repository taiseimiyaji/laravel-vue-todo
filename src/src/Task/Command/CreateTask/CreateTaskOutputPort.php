<?php
declare(strict_types=1);

namespace Todo\Task\Command\CreateTask;

use Todo\Task\ValueObject\Task;

interface CreateTaskOutputPort
{
    public function output(Task $task): void;
}
