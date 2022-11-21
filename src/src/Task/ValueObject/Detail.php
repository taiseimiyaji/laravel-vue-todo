<?php
declare(strict_types=1);

namespace Todo\Task\ValueObject;

use InvalidArgumentException;
use Todo\Shared\Foundation\ValueObject\StringValue;

final class Detail extends StringValue
{
    public const MAX_LENGTH = 1000;

    /**
     * @param string $value
     */
    public function __construct(string $value)
    {
        $this->validate($value);
        $this->value = $value;
    }

    /**
     * @param string $value
     * @return void
     */
    protected function validate(string $value): void
    {
        if (mb_strlen($value) > self::MAX_LENGTH) {
            throw new InvalidArgumentException(sprintf('%s must be less than %s length.', __CLASS__, self::MAX_LENGTH));
        }
    }
}
