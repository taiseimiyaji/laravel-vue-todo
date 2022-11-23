<?php
declare(strict_types=1);

namespace Todo\Task;

interface TaskFactoryInterface
{
    public function createTask(string $name): Task;
}
