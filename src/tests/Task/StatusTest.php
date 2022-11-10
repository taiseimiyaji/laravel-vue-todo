<?php
declare(strict_types=1);

namespace Tests\Task;

use Symfony\Component\Uid\Ulid;
use Tests\TestHelper\FakeString;
use Todo\Task\Status;
use PHPUnit\Framework\TestCase;
use Todo\Task\ValueObject\StatusName;

class StatusTest extends TestCase
{
    /**
     * 正常系: インスタンスの生成と値の取得ができること
     *
     * @return void
     */
    public function test__construct(): void
    {
        $id = Ulid::generate();
        $name = FakeString::makeString(StatusName::MAX_LENGTH);

        $status = new Status(
            $id,
            $name
        );
        $this->assertSame($id, (string)$status->id());
        $this->assertSame($name, (string)$status->name());
        $this->assertSame(
            [
                'status_id' => (string)$status->id(),
                'status_name' => (string)$status->name(),
            ],
            $status->toArray()
        );
    }
}
