<?php
declare(strict_types=1);

namespace Tests\Task\ValueObject;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use Tests\TestHelper\FakeString;
use Todo\Task\ValueObject\TaskLabel;

class TaskLabelTest extends TestCase
{
    public function test__construct()
    {
        $value = FakeString::makeString(TaskLabel::MAX_LENGTH);
        $taskLabel = new TaskLabel($value);
        $this->assertSame($value, (string)$taskLabel);
    }

    public function testMaxLength()
    {
        $value = FakeString::makeString(TaskLabel::MAX_LENGTH + 1);
        $this->expectException(InvalidArgumentException::class);
        new TaskLabel($value);
    }
}