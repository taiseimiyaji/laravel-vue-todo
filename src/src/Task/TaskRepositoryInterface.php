<?php
declare(strict_types=1);

namespace Todo\Task;

use Todo\Task\ValueObject\StatusIdentifier;
use Todo\Task\ValueObject\TaskId;

interface TaskRepositoryInterface
{
    /**
     * @param TaskId $id
     * @return Task
     */
    public function findById(TaskId $id): Task;

    /**
     * @param StatusIdentifier $id
     * @return Status
     */
    public function getStatusById(StatusIdentifier $id): Status;

    /**
     * @param Task $task
     */
    public function save(Task $task);

    /**
     * @param TaskId $id
     * @return void
     */
    public function deleteById(TaskId $id): void;
}
