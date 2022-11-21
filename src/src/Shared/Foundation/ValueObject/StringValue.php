<?php
declare(strict_types=1);

namespace Todo\Shared\Foundation\ValueObject;

abstract class StringValue
{
    /**
     * Base string value
     *
     * @var string
     */
    protected string $value;

    /**
     * Base string constructor
     *
     * @param string $value
     */
    abstract public function __construct(string $value);

    /**
     * to string
     *
     * @return string
     */
    public function __toString(): string
    {
        return $this->value;
    }

    /**
     * string value validate function
     *
     * @param string $value
     * @return void
     */
    abstract protected function validate(string $value): void;

    /**
     * string value judge empty function
     *
     * @return bool
     */
    public function isEmpty(): bool
    {
        return $this->value === '';
    }
}
