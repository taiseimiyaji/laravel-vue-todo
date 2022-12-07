<?php
declare(strict_types=1);

namespace Tests\Task\Command\DeleteTask;

use Tests\TestCase;
use Todo\Task\Command\DeleteTask\DeleteTask;
use Todo\Task\Command\DeleteTask\DeleteTaskInterface;


class DeleteTaskTest extends TestCase
{
    /**
     * @var DeleteTaskInterface
     */
    private DeleteTaskInterface $useCase;

    /**
     * 正常系: インスタンスの生成
     *
     * @return void
     */
    public function test__construct(): void
    {
        $this->useCase = $this->app->make(DeleteTaskInterface::class);
    }


    public function testProcess(): void
    {
    }
}
