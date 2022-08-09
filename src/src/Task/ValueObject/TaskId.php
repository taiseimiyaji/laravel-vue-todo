<?php
declare(strict_types=1);

namespace Todo\Task\ValueObject;

final class TaskId
{
    private string $value;

    /**
     * @param string $value
     */
    public function __construct(string $value)
    {
        $this->validate($value);
        $this->value = $value;
    }

    protected function validate(string $value): void
    {
        return;
    }

    public function __toString(): string
    {
        return $this->value;
    }

    public function toInt(): int
    {
        return (int)$this->value;
    }
}
