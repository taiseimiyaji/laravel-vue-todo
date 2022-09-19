<?php
declare(strict_types=1);

namespace Todo\Task\Command\CreateTask;

use Todo\Task\ValueObject\TaskId;
use Todo\Task\ValueObject\Cost;
use Todo\Task\ValueObject\Name;
use Todo\Task\ValueObject\TaskLabel;
use Todo\Task\ValueObject\Detail;
use Todo\Task\ValueObject\Deadline;

interface CreateTaskInputPort
{
    /**
     * @return TaskId
     */
    public function id(): TaskId;

    /**
     * @return Name
     */
    public function name(): Name;

    /**
     * @return Detail
     */
    public function detail(): Detail;

    /**
     * @return Deadline
     */
    public function deadline(): Deadline;

    /**
     * @return TaskLabel
     */
    public function label(): TaskLabel;

    /**
     * @return Cost
     */
    public function costs(): Cost;
}
