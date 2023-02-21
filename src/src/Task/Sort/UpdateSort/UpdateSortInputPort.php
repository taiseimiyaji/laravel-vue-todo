<?php
declare(strict_types=1);

namespace Todo\Task\Sort\UpdateSort;

use Todo\Task\Sort\SortTaskCollection;

interface UpdateSortInputPort
{
    public function sortTaskCollection(): SortTaskCollection;
}
