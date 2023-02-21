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

class UpdateTaskInput implements UpdateTaskInputPort
{
    /**
     * @var TaskId
     */
    private TaskId $id;

    /**
     * @var Name
     */
    private Name $name;

    /**
     * @var Cost
     */
    private Cost $costs;

    /**
     * @var Deadline
     */
    private Deadline $deadline;

    /**
     * @var Detail
     */
    private Detail $detail;

    /**
     * @var StatusIdentifier
     */
    private StatusIdentifier $statusId;

    /**
     * @var Sort
     */
    private Sort $sort;

    /**
     * @param TaskId $id
     * @param Name $name
     * @param Cost $costs
     * @param Deadline $deadline
     * @param Detail $detail
     * @param StatusIdentifier $statusId
     * @param Sort $sort
     */
    public function __construct(
        TaskId $id,
        Name $name,
        Cost $costs,
        Deadline $deadline,
        Detail $detail,
        StatusIdentifier $statusId,
        Sort $sort
    )
    {
        $this->id = $id;
        $this->name = $name;
        $this->costs = $costs;
        $this->deadline = $deadline;
        $this->detail = $detail;
        $this->statusId = $statusId;
        $this->sort = $sort;
    }

    /**
     * @return TaskId
     */
    public function id(): TaskId
    {
        return $this->id;
    }

    /**
     * @return Name
     */
    public function name(): Name
    {
        return $this->name;
    }

    /**
     * @return Cost
     */
    public function costs(): Cost
    {
        return $this->costs;
    }

    /**
     * @return Deadline
     */
    public function deadline(): ?Deadline
    {
        return $this->deadline;
    }

    /**
     * @return Detail
     */
    public function detail(): Detail
    {
        return $this->detail;
    }

    /**
     * @return StatusIdentifier
     */
    public function statusId(): StatusIdentifier
    {
        return $this->statusId;
    }

    /**
     * @return Sort
     */
    public function sort(): Sort
    {
        return $this->sort;
    }
}
