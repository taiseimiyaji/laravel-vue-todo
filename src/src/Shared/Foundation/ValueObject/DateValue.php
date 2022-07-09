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
        return (string)$this->value;
        // return $this->value->format('Y/m/d H:i:s');
    }

    abstract protected function validate(string $value): void;
}