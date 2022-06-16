<?php
declare(strict_types=1);

namespace Todo\Task\ValueObject;

use DateTimeImmutable;
use Todo\Shared\Foundation\ValueObject\DateValue;

final class TaskDeadline extends DateValue
{
    public function __construct($value)
    {
        $this->validate($value);
        $this->value = $value;
    }

    protected function validate(string $value): void
    {
        return;
    }

}