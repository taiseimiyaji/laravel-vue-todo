<?php
declare(strict_types=1);

namespace Todo\Task\Query\GetAllTask;

use Todo\Task\Query\TaskReadModel;

interface GetAllTaskInterface
{
    /**
     * @return array<TaskReadModel>
     */
    public function process(): array;
}
