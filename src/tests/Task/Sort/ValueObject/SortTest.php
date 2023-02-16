<?php
declare(strict_types=1);

namespace Tests\Task\Sort\ValueObject;

use Todo\Task\Sort\ValueObject\Sort;
use PHPUnit\Framework\TestCase;

class SortTest extends TestCase
{
    /**
     * 正常系: インスタンスの生成とtoIntメソッドのテスト.
     *
     * @return void
     */
    public function test__construct(): void
    {
        $expected = 1;
        $sort = new Sort($expected);
        $this->assertSame($expected, $sort->toInt());
    }
}
