<?php
declare(strict_types=1);

namespace Todo\Shared\Foundation\ValueObject;

abstract class Identifier
{

    abstract protected function validate(string $value): void;

    public function equals(self $id): bool
    {
        return $this->id === $id;
    }

    abstract public function toInt(): int;
}
