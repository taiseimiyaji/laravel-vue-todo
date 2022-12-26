<?php
declare(strict_types=1);

namespace Tests\Adapters\Task\Query\GetAllStatus;

use App\Adapters\Task\Query\GetAllStatus\GetAllStatus;
use Tests\TestCase;
use Todo\Task\Query\GetAllStatus\GetAllStatusInterface;

class GetAllStatusTest extends TestCase
{
    public function test__construct(): void
    {
        $query = $this->app->make(GetAllStatusInterface::class);
        $this->assertInstanceOf(GetAllStatus::class, $query);
    }
}
