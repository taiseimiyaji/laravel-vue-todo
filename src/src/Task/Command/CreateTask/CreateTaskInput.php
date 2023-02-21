<?php
declare(strict_types=1);

namespace Todo\Task\Command\CreateTask;

use Todo\Task\Sort\ValueObject\Sort;
use Todo\Task\ValueObject\Cost;
use Todo\Task\ValueObject\Deadline;
use Todo\Task\ValueObject\Detail;
use Todo\Task\ValueObject\Name;
use Todo\Task\ValueObject\StatusIdentifier;

class CreateTaskInput implements CreateTaskInputPort
{
    private Name $taskName;
    private Detail $taskDetail;
    private ?Deadline $taskDeadline;
    private Cost $taskCost;
    private StatusIdentifier $statusId;
    private Sort $sort;

    /**
     * @param Name $taskName
     * @param Detail $taskDetail
     * @param Deadline|null $taskDeadline
     * @param Cost $taskCost
     * @param StatusIdentifier $statusId
     * @param Sort $sort
     */
    public function __construct(
        Name      $taskName,
        Detail    $taskDetail,
        ?Deadline  $taskDeadline,
        Cost      $taskCost,
        StatusIdentifier $statusId,
        Sort $sort
    )
    {
        $this->taskName = $taskName;
        $this->taskDetail = $taskDetail;
        $this->taskDeadline = $taskDeadline;
        $this->taskCost = $taskCost;
        $this->statusId = $statusId;
        $this->sort = $sort;
    }

    /**
     * @return Name
     */
    public function name(): Name
    {
        return $this->taskName;
    }

    /**
     * @return Cost
     */
    public function costs(): Cost
    {
        return $this->taskCost;
    }

    /**
     * @return Deadline
     */
    public function deadline(): ?Deadline
    {
        return $this->taskDeadline;
    }

    /**
     * @return Detail
     */
    public function detail(): Detail
    {
        return $this->taskDetail;
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
