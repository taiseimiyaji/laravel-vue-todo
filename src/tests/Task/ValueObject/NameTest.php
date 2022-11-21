<?php
declare(strict_types=1);

namespace Tests\Task\ValueObject;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use Tests\TestHelper\FakeString;
use Todo\Task\ValueObject\Name;

class NameTest extends TestCase
{
    public function test__construct(): void
    {
        // TODO: テストコードのconstructでreturnしているコードの意義について調査
        $value = FakeString::makeString(Name::MAX_LENGTH);
        $taskName = new Name($value);
        $this->assertSame($value, (string)$taskName);
    }

    public function testRequired(): void
    {
        $this->expectException(InvalidArgumentException::class);
        new Name('');
    }

    public function testMaxLength(): void
    {
        $value = FakeString::makeString(Name::MAX_LENGTH + 1);
        $this->expectException(InvalidArgumentException::class);
        new Name($value);
    }
}
