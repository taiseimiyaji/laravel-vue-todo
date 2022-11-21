<?php
declare(strict_types=1);

namespace Todo\Task\ValueObject;

use DateTimeImmutable;
use Todo\Shared\Foundation\ValueObject\DateValue;

final class Deadline extends DateValue
{
    public function __construct(DateTimeImmutable $value)
    {
        $this->validate($value);
        $this->value = $value;
    }

    protected function validate(DateTimeImmutable $value): void
    {
        return;
    }

}
