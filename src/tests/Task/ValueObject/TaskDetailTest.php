<?php
declare(strict_types=1);

namespace Tests\Task\ValueObject;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use Tests\TestHelper\FakeString;
use Todo\Task\ValueObject\TaskDetail;

class TaskDetailTest extends TestCase
{
    public function test__construct()
    {
        $value = '';
        $taskDetail = new TaskDetail($value);
        $this->assertSame($value, (string)$taskDetail);
    }

    public function testMaxLength()
    {
        $value = FakeString::makeString(TaskDetail::MAX_LENGTH + 1);
        $this->expectException(InvalidArgumentException::class);
        new TaskDetail($value);
    }
}
