<?php
declare(strict_types=1);

namespace Todo\Task\Query\GetTaskQuery;

interface GetTaskQueryInterface
{
    public function construct();

    public function process();
}
