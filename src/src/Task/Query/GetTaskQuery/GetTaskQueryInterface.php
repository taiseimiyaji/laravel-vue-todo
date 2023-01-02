<?php
declare(strict_types=1);

namespace Todo\Task\Query\GetTaskQuery;

use Todo\Task\Query\TaskReadModel;

interface GetTaskQueryInterface
{
    /**
     * @param GetTaskInputPort $input
     * @return TaskReadModel
     */
    public function process(GetTaskInputPort $input): TaskReadModel;
}
