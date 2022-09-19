<?php
declare(strict_types=1);

namespace Todo\Task\ValueObject;

use InvalidArgumentException;
use Todo\Shared\Foundation\ValueObject\Identifier;

class StatusIdentifier extends Identifier
{
    private string $id;

    public function __construct(string $id)
    {
        $this->validate($id);
        $this->id = $id;
    }

    public function validate(string $id): void
    {
        if(!$this->validateForUlid($id)){
            throw new InvalidArgumentException('%s id is invalid.', __class__);
        }
    }
}
