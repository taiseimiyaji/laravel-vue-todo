<?php
declare(strict_types=1);

namespace Todo\Task\Command\UpdateTask;

use Todo\Task\Sort\ValueObject\Sort;
use Todo\Task\ValueObject\Cost;
use Todo\Task\ValueObject\Deadline;
use Todo\Task\ValueObject\Detail;
use Todo\Task\ValueObject\Name;
use Todo\Task\ValueObject\StatusIdentifier;
use Todo\Task\ValueObject\TaskId;

interface UpdateTaskInputPort
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
     * @return Cost
     */
    public function costs(): Cost;

    /**
     * @return Deadline
     */
    public function deadline(): ?Deadline;

    /**
     * @return Detail
     */
    public function detail(): Detail;

    /**
     * @return StatusIdentifier
     */
    public function statusId(): StatusIdentifier;

    /**
     * @return Sort
     */
    public function sort(): Sort;
}
