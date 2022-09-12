<?php
declare(strict_types=1);

namespace Todo\Task\Command\DeleteTask;

use Todo\Task\ValueObject\TaskId;

interface DeleteTaskInputPort
{
    /**
     * @return TaskId
     */
    public function id(): TaskId;
}
