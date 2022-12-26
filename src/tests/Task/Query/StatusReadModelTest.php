<?php
declare(strict_types=1);

namespace Tests\Task\Query;

use Symfony\Component\Uid\Ulid;
use Tests\TestHelper\FakeString;
use Todo\Task\Query\StatusReadModel;
use PHPUnit\Framework\TestCase;
use Todo\Task\ValueObject\StatusIdentifier;
use Todo\Task\ValueObject\StatusName;

class StatusReadModelTest extends TestCase
{
    /**
     * 正常にデータの受け渡しができること.
     *
     * @return void
     */
    public function test__construct(): void
    {
        $id = Ulid::generate();
        $name = FakeString::makeString(StatusName::MAX_LENGTH);

        $status = new StatusReadModel($id, $name);

        $this->assertSame($id, $status->id());
        $this->assertSame($name, $status->name());
    }
}
