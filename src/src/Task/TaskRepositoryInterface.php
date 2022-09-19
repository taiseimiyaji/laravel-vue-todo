<?php
declare(strict_types=1);

namespace Todo\Task;

use Todo\Task\ValueObject\TaskId;

interface TaskRepositoryInterface
{
    /**
     * @param int $id
     * @return Task
     */
    public function findById(int $id): Task;

    /**
     * @param Task $task
     * @return Task
     */
    public function save(Task $task): Task;

    /**
     * @param TaskId $id
     * @return void
     */
    public function deleteById(TaskId $id): void;
}
