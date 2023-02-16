<?php
declare(strict_types=1);

namespace Tests\Task\Sort;

use Symfony\Component\Uid\Ulid;
use Todo\Task\Sort\SortTask;
use Todo\Task\Sort\SortTaskCollection;
use PHPUnit\Framework\TestCase;
use Todo\Task\Sort\ValueObject\Sort;
use Todo\Task\ValueObject\StatusIdentifier;
use Todo\Task\ValueObject\TaskId;

class SortTaskCollectionTest extends TestCase
{
    /**
     * 正常系: インスタンスの生成とtoArrayメソッドのテスト.
     *
     * @return void
     */
    public function test__construct(): void
    {
        $sortTask1 = new SortTask(
            new TaskId(Ulid::generate()),
            new StatusIdentifier(Ulid::generate()),
            new Sort(1)
        );

        $sortTask2 = new SortTask(
            new TaskId(Ulid::generate()),
            new StatusIdentifier(Ulid::generate()),
            new Sort(2)
        );

        $expected = [
            $sortTask1,
            $sortTask2
        ];

        $sortTaskCollection = new SortTaskCollection($expected);
        $this->assertSame([
            $sortTask1->toArray(),
            $sortTask2->toArray()
        ], $sortTaskCollection->toArray());
    }

}
