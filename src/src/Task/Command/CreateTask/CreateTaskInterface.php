<?php
declare(strict_types=1);

namespace Todo\Task\Command\CreateTask;

interface CreateTaskInterface
{
    public function process(CreateTaskInputPort $inputPort);
}
