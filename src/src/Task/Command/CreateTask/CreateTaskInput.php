<?php
declare(strict_types=1);


namespace Todo\Task\Command\CreateTask;

use Todo\Task\ValueObject\TaskId;
use Todo\Task\ValueObject\TaskCost;
use Todo\Task\ValueObject\TaskName;
use Todo\Task\ValueObject\TaskLabel;
use Todo\Task\ValueObject\TaskDetail;
use Todo\Task\ValueObject\TaskDeadline;

class CreateTaskInput implements CreateTaskInputPort
{
    private TaskId $taskId;
    private TaskName $taskName;
    private TaskDetail $taskDetail;
    private TaskDeadline $taskDeadline;
    private TaskLabel $taskLabel;
    private TaskCost $taskCost;

    /**
     * @param TaskId $taskId
     * @param TaskName $taskName
     * @param TaskDetail $taskDetail
     * @param TaskDeadline $taskDeadline
     * @param TaskLabel $taskLabel
     * @param TaskCost $taskCost
     */
    public function __construct(
        TaskId $taskId,
        TaskName $taskName,
        TaskDetail $taskDetail,
        TaskDeadline $taskDeadline,
        TaskLabel $taskLabel,
        TaskCost $taskCost
    )
    {
        $this->taskId = $taskId;
        $this->taskName = $taskName;
        $this->taskDetail = $taskDetail;
        $this->taskDeadline = $taskDeadline;
        $this->taskLabel = $taskLabel;
        $this->taskCost = $taskCost;
    }

    public function id(): TaskId
    {
        return $this->taskId;
    }

    public function name(): TaskName
    {
        return $this->taskName;
    }

    public function detail(): TaskDetail
    {
        return $this->taskDetail;
    }

    public function deadline(): TaskDeadline
    {
        return $this->taskDeadline;
    }

    public function label(): TaskLabel
    {
        return $this->taskLabel;
    }

    public function costs(): TaskCost
    {
        return $this->taskCost;
    }
}
