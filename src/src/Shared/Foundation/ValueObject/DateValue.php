<?php
declare(strict_types=1);

namespace Todo\Shared\Foundation\ValueObject;

use DateTimeImmutable;

abstract class DateValue
{
    protected $value;

    abstract function __construct(DatetimeImmutable $value);

    public function __toString()
    {
         return $this->value->format('Y-m-d');
    }

    abstract protected function validate(DateTimeImmutable $value): void;
}
