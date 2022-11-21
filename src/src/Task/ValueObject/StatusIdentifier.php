<?php
declare(strict_types=1);

namespace Todo\Task\ValueObject;

use InvalidArgumentException;
use Todo\Shared\Foundation\ValueObject\Identifier;

/**
 * ULID形式のステータスID
 */
class StatusIdentifier extends Identifier
{
    public function __construct(string $id)
    {
        $this->validate($id);
        $this->id = $id;
    }

    public function validate(string $value): void
    {
        if(!$this->validateForUlid($value)){
            throw new InvalidArgumentException(sprintf('%s id is invalid.', __CLASS__));
        }
    }
}
