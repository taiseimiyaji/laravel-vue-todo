<?php
declare(strict_types=1);

namespace Tests\Task\Query;

use Tests\TestHelper\FakeString;
use Todo\Task\Query\TaskReadModel;
use PHPUnit\Framework\TestCase;

class TaskReadModelTest extends TestCase
{
    /**
     * @return void
     */
    public function test__construct(): void
    {
        $id = FakeString::makeString(10);
        $name = FakeString::makeString(10);
        $cost = FakeString::makeString(10);
        $deadline = FakeString::makeString(10);
        $detail = FakeString::makeString(10);
        $statusId = FakeString::makeString(10);
        $statusName = FakeString::makeString(10);
        $sort = FakeString::makeString(10);

        $readModel = new TaskReadModel(
            $id,
            $name,
            $cost,
            $deadline,
            $detail,
            $statusId,
            $statusName,
            $sort
        );
        $this->assertSame($id, $readModel->id());
        $this->assertSame($name, $readModel->name());
        $this->assertSame($cost, $readModel->cost());
        $this->assertSame($deadline, $readModel->deadline());
        $this->assertSame($detail, $readModel->detail());
        $this->assertSame($statusId, $readModel->statusId());
        $this->assertSame($statusName, $readModel->statusName());
        $this->assertSame($sort, $readModel->sort());
    }
}
