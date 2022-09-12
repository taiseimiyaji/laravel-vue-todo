<?php
declare(strict_types=1);

namespace Todo\Task\Command\DeleteTask;

use Todo\Task\ValueObject\TaskId;

class DeleteTaskInput implements DeleteTaskInputPort
{
    /**
     * @var TaskId
     */
    private TaskId $id;

    /**
     * @param TaskId $id
     */
    public function __construct(
        TaskId $id
    ){
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
