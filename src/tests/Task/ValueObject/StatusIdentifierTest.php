<?php
declare(strict_types=1);

namespace Tests\Task\ValueObject;

use InvalidArgumentException;
use Symfony\Component\Uid\Ulid;
use Todo\Task\ValueObject\StatusIdentifier;
use PHPUnit\Framework\TestCase;

class StatusIdentifierTest extends TestCase
{
    /**
     * 正常系: インスタンスの生成とIdentifier型であること
     *
     * @return void
     */
    public function test__construct(): void
    {
        $expect = Ulid::generate();
        $id = new StatusIdentifier($expect);

        $this->assertSame($expect, (string)$id);
    }

    /**
     * 異常系: Ulidの仕様をみたしていない場合
     *
     * @return void
     */
    public function testInvalidUlid(): void
    {
        $expect = '1';
        $this->expectException(InvalidArgumentException::class);
        new StatusIdentifier($expect);
    }
}
