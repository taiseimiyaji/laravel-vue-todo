<?php
declare(strict_types=1);

namespace Todo\Task\Query\GetTaskQuery;

use Todo\Task\ValueObject\TaskId;

interface GetTaskInputPort
{
    /**
     * @param int $id
     */
    public function __construct(Taskid $id);

    /**
     * @return TaskId
     */
    public function id(): TaskId;
}
