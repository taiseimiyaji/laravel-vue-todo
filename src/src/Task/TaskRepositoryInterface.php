<?php
declare(strict_types=1);

namespace Todo\Task;

use Todo\Task\ValueObject\Task;

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
     * @param Task $task
     * @return void
     */
    public function delete(Task $task): void;
}
