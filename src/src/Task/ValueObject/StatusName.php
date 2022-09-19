<?php
declare(strict_types=1);

namespace Todo\Task\ValueObject;

use InvalidArgumentException;
use Todo\Shared\Foundation\ValueObject\StringValue;

class StatusName extends StringValue
{
    private string $name;
    private const MAX_LENGTH = 50;

    public function __construct(string $name)
    {
        $this->validate($name);
        $this->name = $name;
    }

    protected function validate(string $value): void
    {
        if ($value === '') {
            throw new InvalidArgumentException(sprintf('%s is required.', __CLASS__));
        }
        if (mb_strlen($value) > self::MAX_LENGTH) {
            throw new InvalidArgumentException(sprintf('%s must be %s length.', __CLASS__, self::MAX_LENGTH));
        }
    }
}
