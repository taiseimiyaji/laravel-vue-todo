<?php
declare(strict_types=1);

namespace Todo\Task\Sort\UpdateSort;

use Todo\Task\Sort\SortTaskCollection;

interface UpdateSortInterface
{
    public function process(UpdateSortInputPort $input): SortTaskCollection;
}
