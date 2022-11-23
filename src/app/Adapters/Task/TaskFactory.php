<?php
declare(strict_types=1);

namespace App\Adapters\Task;

use DateTimeImmutable;
use Symfony\Component\Uid\Ulid;
use Todo\Task\Status;
use Todo\Task\Task;
use Todo\Task\TaskFactoryInterface;
use Todo\Task\ValueObject\Cost;
use Todo\Task\ValueObject\Deadline;
use Todo\Task\ValueObject\Detail;
use Todo\Task\ValueObject\Name;
use Todo\Task\ValueObject\TaskId;

class TaskFactory implements TaskFactoryInterface
{
    /**
     * @param string $name
     * @return Task
     */
    public function createTask(
        string $name
    ): Task
    {
        return new Task(
            new TaskId(Ulid::generate()),
            new Name($name),
            new Cost(0),
            new Deadline(new DateTimeImmutable()),
            new Detail(''),
            new Status(Ulid::generate(), Status::STATUS_DEFAULT)
        );
    }
}
