<?php
declare(strict_types=1);

namespace Todo\Shared\Foundation\ValueObject;

abstract class Identifier
{
    abstract protected function validate(): void;

    public function equals(self $id): bool
    {
        if (!$id instanceof self) {
            return false;
        }
        return $this->id === $id;
    }

    abstract public function toInt(): int;
}