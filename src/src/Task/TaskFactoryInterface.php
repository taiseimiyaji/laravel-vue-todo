<?php
declare(strict_types=1);

namespace Todo\Task;

use Todo\Task\ValueObject\Task;
use Todo\Task\ValueObject\TaskId;
use Todo\Task\ValueObject\TaskCost;
use Todo\Task\ValueObject\TaskName;
use Todo\Task\ValueObject\TaskLabel;
use Todo\Task\ValueObject\TaskTodos;
use Todo\Task\ValueObject\TaskDetail;
use Todo\Task\ValueObject\TaskDeadline;

interface TaskFactoryInterface
{
    public function newTask(
    TaskId $taskId,
    TaskName $taskName,
    TaskDetail $taskDetail,
    TaskDeadline $taskDeadline,
    TaskLabel $taskLabel,
    TaskCost $taskCost,
    TaskTodos $taskTodos
    ): Task;
}