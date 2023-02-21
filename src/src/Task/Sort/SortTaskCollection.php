<?php
declare(strict_types=1);

namespace Todo\Task\Sort;

use InvalidArgumentException;
use Throwable;
use Todo\Shared\Foundation\Collection;
use Todo\Task\Sort\ValueObject\Sort;
use Todo\Task\ValueObject\StatusIdentifier;
use Todo\Task\ValueObject\TaskId;

class SortTaskCollection extends Collection
{
    /**
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        foreach ($attributes as $attribute) {
            $this->validate($attribute);
        }
        $this->attributes = $attributes;
    }

    /**
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        return array_map(static function(SortTask $attribute) {
            return $attribute->toArray();
        }, $this->attributes);
    }

    /**
     * @param array<string, mixed> $attributes
     * @return static
     */
    public static function fromArray(array $attributes): self
    {
        try {
            $sorts = array_map(static function ($attribute) {
                return new SortTask(
                    new TaskId($attribute['id']),
                    new StatusIdentifier($attribute['statusId']),
                    new Sort((int)$attribute['sort'])
                );
            }, $attributes);
        } catch(Throwable $e){
            throw new InvalidArgumentException('SortTaskCollection作成時に想定しないエラーが発生.');
        }
        return new self($sorts);
    }

    /**
     * @param SortTask $attribute
     * @return void
     */
    protected function validate(SortTask $attribute): void
    {
    }
}
