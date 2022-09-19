<?php
declare(strict_types=1);

namespace Todo\Task;

use Todo\Task\ValueObject\Cost;
use Todo\Task\ValueObject\Deadline;
use Todo\Task\ValueObject\Detail;
use Todo\Task\ValueObject\Status;
use Todo\Task\ValueObject\TaskId;
use Todo\Task\ValueObject\TaskLabel;
use Todo\Task\ValueObject\Name;

final class Task
{
    private TaskId $taskId;
    private Name $taskName;
    private Detail $taskDetail;
    private Deadline $taskDeadline;
    private Cost $taskCost;
    private Status $taskStatus;

    /**
     * @param TaskId $taskId
     * @param Name $taskName
     * @param Cost $taskCost
     * @param Deadline $taskDeadline
     * @param Detail $taskDetail
     * @param Status $taskStatus
     */
    public function __construct(
        TaskId    $taskId,
        Name      $taskName,
        Cost      $taskCost,
        Deadline  $taskDeadline,
        Detail    $taskDetail,
        Status    $taskStatus

    ) {
        $this->taskId = $taskId;
        $this->taskName = $taskName;
        $this->taskCost = $taskCost;
        $this->taskDeadline = $taskDeadline;
        $this->taskDetail = $taskDetail;
        $this->taskStatus = $taskStatus;
    }

    public function taskId(): TaskId
    {
        return $this->taskId;
    }
    public function taskName(): Name
    {
        return $this->taskName;
    }
    public function taskCost(): Cost
    {
        return $this->taskCost;
    }
    public function taskDeadline(): Deadline
    {
        return $this->taskDeadline;
    }
    public function taskDetail(): Detail
    {
        return $this->taskDetail;
    }

    public function taskStatus(): Status
    {
        return $this->taskStatus;
    }

    public function toArray(): array
    {
        return[
            'task_id' => (string)$this->taskId,
            'task_name' => (string)$this->taskName,
            'task_detail' => (string)$this->taskDetail,
            'task_deadline' => (string)$this->taskDeadline,
            'task_cost' => $this->taskCost->toInt(),
            'task_status' => (string)$this->taskStatus->name(),
        ];
    }
}
