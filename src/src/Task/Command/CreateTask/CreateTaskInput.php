<?php
declare(strict_types=1);

namespace Todo\Task\Command\CreateTask;

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

    /**
     * @param Name $taskName
     * @param Detail $taskDetail
     * @param Deadline|null $taskDeadline
     * @param Cost $taskCost
     * @param StatusIdentifier $statusId
     */
    public function __construct(
        Name      $taskName,
        Detail    $taskDetail,
        ?Deadline  $taskDeadline,
        Cost      $taskCost,
        StatusIdentifier $statusId
    )
    {
        $this->taskName = $taskName;
        $this->taskDetail = $taskDetail;
        $this->taskDeadline = $taskDeadline;
        $this->taskCost = $taskCost;
        $this->statusId = $statusId;
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
        return new StatusIdentifier((string)$this->statusId);
    }
}
