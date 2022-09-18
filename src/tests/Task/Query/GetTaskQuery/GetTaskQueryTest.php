<?php
declare(strict_types=1);

namespace Tests\Task\Query\GetTaskQuery;

use Todo\Task\Query\GetTaskQuery\GetTaskQuery;
use PHPUnit\Framework\TestCase;

class GetTaskQueryTest extends TestCase
{
    /**
     * @return void
     */
    public function test__construct(): void
    {
        $this->app->make();
    }
}
