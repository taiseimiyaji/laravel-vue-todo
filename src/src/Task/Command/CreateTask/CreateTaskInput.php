<?php
declare(strict_types=1);

namespace Todo\Task\Command\CreateTask;

use Todo\Task\ValueObject\TaskId;
use Todo\Task\ValueObject\Cost;
use Todo\Task\ValueObject\Name;
use Todo\Task\ValueObject\TaskLabel;
use Todo\Task\ValueObject\Detail;
use Todo\Task\ValueObject\Deadline;

class CreateTaskInput implements CreateTaskInputPort
{
    private TaskId $taskId;
    private Name $taskName;
    private Detail $taskDetail;
    private Deadline $taskDeadline;
    private TaskLabel $taskLabel;
    private Cost $taskCost;

    /**
     * @param TaskId $taskId
     * @param Name $taskName
     * @param Detail $taskDetail
     * @param Deadline $taskDeadline
     * @param TaskLabel $taskLabel
     * @param Cost $taskCost
     */
    public function __construct(
        TaskId    $taskId,
        Name      $taskName,
        Detail    $taskDetail,
        Deadline  $taskDeadline,
        TaskLabel $taskLabel,
        Cost $taskCost
    )
    {
        $this->taskId = $taskId;
        $this->taskName = $taskName;
        $this->taskDetail = $taskDetail;
        $this->taskDeadline = $taskDeadline;
        $this->taskLabel = $taskLabel;
        $this->taskCost = $taskCost;
    }

    /**
     * @return TaskId
     */
    public function id(): TaskId
    {
        return $this->taskId;
    }

    /**
     * @return Name
     */
    public function name(): Name
    {
        return $this->taskName;
    }

    /**
     * @return Detail
     */
    public function detail(): Detail
    {
        return $this->taskDetail;
    }

    /**
     * @return Deadline
     */
    public function deadline(): Deadline
    {
        return $this->taskDeadline;
    }

    /**
     * @return TaskLabel
     */
    public function label(): TaskLabel
    {
        return $this->taskLabel;
    }

    /**
     * @return Cost
     */
    public function costs(): Cost
    {
        return $this->taskCost;
    }
}
