<?php
declare(strict_types=1);

namespace Tests\Task\Sort;

use Symfony\Component\Uid\Ulid;
use Todo\Task\Sort\SortTask;
use PHPUnit\Framework\TestCase;
use Todo\Task\Sort\ValueObject\Sort;
use Todo\Task\ValueObject\StatusIdentifier;
use Todo\Task\ValueObject\TaskId;

class SortTaskTest extends TestCase
{
    /**
     * 正常系: インスタンスの生成とプロパティのゲッターのテスト.
     *
     * @return void
     */
    public function test__construct(): void
    {
        $taskId = new TaskId(Ulid::generate());
        $statusId = new StatusIdentifier(Ulid::generate());
        $sort = new Sort(1);

        $sortTask = new SortTask(
            $taskId,
            $statusId,
            $sort
        );
        $this->assertSame($taskId, $sortTask->id());
        $this->assertSame($statusId, $sortTask->statusId());
        $this->assertSame($sort, $sortTask->sort());
        $this->assertSame(
            [
                'taskId' => (string)$taskId,
                'statusId' => (string)$statusId,
                'sort' => $sort->toInt()
            ],
            $sortTask->toArray()
        );
    }
}
