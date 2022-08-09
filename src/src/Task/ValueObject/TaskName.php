<?php
declare(strict_types=1);

namespace Todo\Task\ValueObject;

use InvalidArgumentException;
use Todo\Shared\Foundation\ValueObject\StringValue;

final class TaskName extends StringValue
{
    public const MAX_LENGTH = 100;

    public function __construct(string $value)
    {
        $this->validate($value);
        $this->value = $value;
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
