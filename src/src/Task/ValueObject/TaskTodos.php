<?php
declare(strict_types=1);

namespace Todo\Task\ValueObject;

final class TaskTodos
{
    private string $value;

    public function __construct(string $value)
    {
        $this->value = $value;
    }

    public function __toString()
    {
        return (string)$this->value;
    }
}