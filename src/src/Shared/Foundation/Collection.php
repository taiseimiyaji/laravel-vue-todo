<?php
declare(strict_types=1);

namespace Todo\Shared\Foundation;

use ArrayIterator;
use Countable;
use IteratorAggregate;

abstract class Collection implements IteratorAggregate, Countable
{
    /**
     * @var mixed[]
     */
    protected array $attributes = [];

    /**
     * @param mixed[] $attributes
     */
    abstract public function __construct(array $attributes = []);

    /**
     * @return mixed[]
     */
    abstract public function toArray(): array;

    /**
     * @return ArrayIterator
     */
    public function getIterator(): ArrayIterator
    {
        return new ArrayIterator($this->attributes);
    }

    /**
     * @return int
     */
    public function count(): int
    {
        return count($this->attributes);
    }
}
