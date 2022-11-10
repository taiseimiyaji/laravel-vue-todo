<?php
declare(strict_types=1);

namespace Tests\Task\ValueObject;

use Tests\TestHelper\FakeString;
use Todo\Task\ValueObject\StatusName;
use PHPUnit\Framework\TestCase;

class StatusNameTest extends TestCase
{
    public function test__construct(): void
    {
        $expect = FakeString::makeString(StatusName::MAX_LENGTH);
        $name = new StatusName($expect);
        $this->assertSame($expect, (string)$name);
    }
}
