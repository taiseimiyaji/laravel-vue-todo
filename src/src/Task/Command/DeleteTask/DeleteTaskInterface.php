<?php
declare(strict_types=1);

namespace Todo\Task\Command\DeleteTask;

interface DeleteTaskInterface
{

    /**
     * @param DeleteTaskInputPort $input
     * @return void
     */
    public function process(DeleteTaskInputPort $input): void;
}
