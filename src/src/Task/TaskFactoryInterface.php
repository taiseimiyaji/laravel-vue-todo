<?php
declare(strict_types=1);

namespace Todo\Task;

use Todo\Task\ValueObject\Cost;
use Todo\Task\ValueObject\Deadline;
use Todo\Task\ValueObject\Detail;
use Todo\Task\ValueObject\TaskId;
use Todo\Task\ValueObject\TaskLabel;
use Todo\Task\ValueObject\Name;

interface TaskFactoryInterface
{
    /**
     * @param TaskId $taskId
     * @param Name $taskName
     * @param Detail $taskDetail
     * @param Deadline $taskDeadline
     * @param TaskLabel $taskLabel
     * @param Cost $taskCost
     * @return Task
     */
    public function newTask(
        TaskId    $taskId,
        Name      $taskName,
        Detail    $taskDetail,
        Deadline  $taskDeadline,
        TaskLabel $taskLabel,
        Cost $taskCost
    ): Task;
}
