<?php
declare(strict_types=1);

namespace Todo\Task\Command\CreateTask;

use Todo\Task\ValueObject\TaskId;
use Todo\Task\ValueObject\TaskCost;
use Todo\Task\ValueObject\TaskName;
use Todo\Task\ValueObject\TaskLabel;
use Todo\Task\ValueObject\TaskTodos;
use Todo\Task\ValueObject\TaskDetail;
use Todo\Task\ValueObject\TaskDeadline;

interface CreateTaskInputPort
{
    public function id(): TaskId;

    public function name(): TaskName;

    public function detail(): TaskDetail;

    public function deadline(): TaskDeadline;

    public function label(): TaskLabel;

    public function costs(): TaskCost;

    public function todos(): TaskTodos;
}
