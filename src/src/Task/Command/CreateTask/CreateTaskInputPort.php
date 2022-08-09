<?php
declare(strict_types=1);

namespace Todo\Task\Command\CreateTask;

use Todo\Task\ValueObject\TaskId;
use Todo\Task\ValueObject\TaskCost;
use Todo\Task\ValueObject\TaskName;
use Todo\Task\ValueObject\TaskLabel;
use Todo\Task\ValueObject\TaskDetail;
use Todo\Task\ValueObject\TaskDeadline;

interface CreateTaskInputPort
{
    /**
     * @return TaskId
     */
    public function id(): TaskId;

    /**
     * @return TaskName
     */
    public function name(): TaskName;

    /**
     * @return TaskDetail
     */
    public function detail(): TaskDetail;

    /**
     * @return TaskDeadline
     */
    public function deadline(): TaskDeadline;

    /**
     * @return TaskLabel
     */
    public function label(): TaskLabel;

    /**
     * @return TaskCost
     */
    public function costs(): TaskCost;
}
