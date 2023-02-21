<?php
declare(strict_types=1);

namespace Todo\Task\Sort\UpdateSort;

use Todo\Task\Sort\SortTaskCollection;
use Todo\Task\TaskRepositoryInterface;

class UpdateSort implements UpdateSortInterface
{
    private TaskRepositoryInterface $repository;

    public function __construct(
        TaskRepositoryInterface $repository
    )
    {
        $this->repository = $repository;
    }

    /**
     * @param UpdateSortInputPort $input
     * @return SortTaskCollection
     */
    public function process(UpdateSortInputPort $input): SortTaskCollection
    {
        foreach ($input->sortTaskCollection() as $taskSort) {
            $task = $this->repository->findById($taskSort->id());
            $task->setSort($taskSort->sort());
            $status = $this->repository->getStatusById($taskSort->statusId());
            $task->setStatus($status);

            $this->repository->save($task);
        }

        return $input->sortTaskCollection();
    }
}
