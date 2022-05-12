<?php
declare(strict_types=1);

namespace Tests\Task\ValueObject;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use Tests\TestHelper\FakeString;
use Todo\Task\ValueObject\TaskName;

class TaskNameTest extends TestCase
{
    public function test__construct()
    {
        // TODO: テストコードのconstructでreturnしているコードの意義について調査
        $value = FakeString::makeString(TaskName::MAX_LENGTH);
        $taskName = new TaskName($value);
        $this->assertSame($value, (string)$taskName);
    }
    public function testRequired()
    {
        $this->expectException(InvalidArgumentException::class);
        new TaskName('');
    }
    public function testMaxLength()
    {
        $value = FakeString::makeString(TaskName::MAX_LENGTH + 1);
        $this->expectException(InvalidArgumentException::class);
        new TaskName($value);
    }
}
