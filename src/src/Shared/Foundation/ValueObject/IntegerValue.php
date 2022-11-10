<?php
declare(strict_types=1);

namespace Todo\Shared\Foundation\ValueObject;

abstract class IntegerValue
{
    protected int $value;

    abstract public function __construct(int $values);

    public function toInt(): int
    {
        return $this->value;
    }

    abstract protected function validate(int $value): void;
}
