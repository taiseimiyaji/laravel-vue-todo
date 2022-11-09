<?php
declare(strict_types=1);

namespace Todo\Task;

use Todo\Task\ValueObject\StatusIdentifier;
use Todo\Task\ValueObject\StatusName;

class Status
{
    private StatusIdentifier $id;

    private StatusName $name;

    public const STATUS_DEFAULT = 'ToDo';

    public function __construct(string $id, string $name)
    {
        $this->id = new StatusIdentifier($id);
        $this->name = new StatusName($name);
    }

    public function id(): StatusIdentifier
    {
        return $this->id;
    }

    public function name(): StatusName
    {
        return $this->name;
    }

    public function toArray(): array
    {
        return
            [
                'status_id' => (string)$this->id(),
                'status_name' => (string)$this->name()
            ];
    }
}
