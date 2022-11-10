<?php
declare(strict_types=1);

namespace Todo\Task\ValueObject;

use InvalidArgumentException;
use Todo\Shared\Foundation\ValueObject\Identifier;

final class TaskId extends Identifier
{

    public function __construct(string $value)
    {
        $this->validate($value);
        $this->id = $value;
    }

    protected function validate(string $value): void
    {
        if(!$this->validateForUlid($value)) {
            throw new InvalidArgumentException('%s id is invalid.', __class__);
        }
    }
}
