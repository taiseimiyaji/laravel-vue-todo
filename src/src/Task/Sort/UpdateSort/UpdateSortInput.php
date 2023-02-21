<?php
declare(strict_types=1);

namespace Todo\Task\Sort\UpdateSort;

use Todo\Task\Sort\SortTaskCollection;

class UpdateSortInput implements UpdateSortInputPort
{
    /**
     * @var SortTaskCollection
     */
    private SortTaskCollection $sortTaskCollection;

    /**
     * @param SortTaskCollection $sortTaskCollection
     */
    public function __construct(
        SortTaskCollection $sortTaskCollection
    )
    {
        $this->sortTaskCollection = $sortTaskCollection;
    }


    public function sortTaskCollection(): SortTaskCollection
    {
        return $this->sortTaskCollection;
    }
}
