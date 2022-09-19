<?php
declare(strict_types=1);

namespace Todo\Task\ValueObject;

class Status
{
    private StatusIdentifier $id;

    private StatusName $name;

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
