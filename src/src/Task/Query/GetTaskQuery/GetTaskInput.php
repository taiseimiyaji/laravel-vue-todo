<?php
declare(strict_types=1);

namespace Todo\Task\Query\GetTaskQuery;

use Todo\Task\ValueObject\TaskId;

class GetTaskInput implements GetTaskInputPort
{
    /**
     * @var TaskId
     */
    private TaskId $id;

    /**
     * @param TaskId $id
     */
    public function __construct
    (
        TaskId $id
    )
    {
        $this->id = $id;
    }

    /**
     * @return TaskId
     */
    public function id(): TaskId
    {
        return $this->id;
    }
}
