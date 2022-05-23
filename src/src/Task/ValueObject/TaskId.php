<?php
declare(strict_types=1);

namespace Todo\Task\ValueObject;

use Todo\Shared\Foundation\ValueObject\Identifier;

class TaskId extends Identifier
{
    private string $value;

    public function __construct(string $value)
    {
        $this->validate($value);
        $this->value = $value;
    }

    protected function validate(): void
    {

    }

    public function toInt(): int
    {
        return (int)$this->value;
    }
}