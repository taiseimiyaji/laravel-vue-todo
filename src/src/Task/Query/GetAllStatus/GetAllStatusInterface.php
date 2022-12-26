<?php
declare(strict_types=1);

namespace Todo\Task\Query\GetAllStatus;

use Todo\Task\Query\StatusReadModel;

interface GetAllStatusInterface
{
    /**
     * @return array<StatusReadModel>
     */
    public function process(): array;
}
