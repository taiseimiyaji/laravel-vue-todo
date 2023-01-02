<?php
declare(strict_types=1);

namespace Todo\Task\Command\UpdateTask;
use Todo\Task\Task;

interface UpdateTaskInterface
{
    public function process(UpdateTaskInputPort $input): Task;
}
