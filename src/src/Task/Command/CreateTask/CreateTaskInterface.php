<?php
declare(strict_types=1);

namespace Todo\Task\Command\CreateTask;

use Todo\Task\Command\CreateTask\CreateTaskInputPort;
use Todo\Task\Command\CreateTask\CreateTaskOutputPort;

interface CreateTaskInterface
{
    public function process(CreateTaskInputPort $inputPort, CreateTaskOutputPort $outputPort);
}
