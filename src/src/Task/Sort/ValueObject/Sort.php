<?php
declare(strict_types=1);

namespace Todo\Task\Sort\ValueObject;

class Sort
{
    /**
     * @var int
     */
    private int $value;

    /**
     * @param int $value
     */
    public function __construct(int $value)
    {
        $this->validate($value);
        $this->value = $value;
    }

    /**
     * @param int $value
     * @return void
     */
    private function validate(int $value): void
    {
    }

    public function toInt(): int
    {
        return $this->value;
    }
}
