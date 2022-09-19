<?php
declare(strict_types=1);

namespace Todo\Task\ValueObject;

use Todo\Shared\Foundation\ValueObject\IntegerValue;

final class Cost extends IntegerValue
{
    private int $value;

    public function __construct(int $value)
    {
        $this->value = $value;
    }

    protected function validate(int $value): void
    {

    }


}
