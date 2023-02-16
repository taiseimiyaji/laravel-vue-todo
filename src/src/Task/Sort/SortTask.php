<?php
declare(strict_types=1);

namespace Todo\Task\Sort;

use Todo\Task\Sort\ValueObject\Sort;
use Todo\Task\ValueObject\StatusIdentifier;
use Todo\Task\ValueObject\TaskId;

/**
 * 表示順のためのエンティティ。
 * タスクの情報のうち、IDとステータスID、表示順のみを持つ
 */
class SortTask
{
    /**
     * @var TaskId
     */
    private TaskId $id;

    /**
     * @var StatusIdentifier
     */
    private StatusIdentifier $statusId;

    /**
     * @var Sort
     */
    private Sort $sort;

    /**
     * @param TaskId $id
     * @param StatusIdentifier $statusId
     * @param Sort $sort
     */
    public function __construct(
        TaskId $id,
        StatusIdentifier $statusId,
        Sort $sort
    )
    {
        $this->id = $id;
        $this->statusId = $statusId;
        $this->sort = $sort;
    }

    /**
     * @return TaskId
     */
    public function id(): TaskId
    {
        return $this->id;
    }

    /**
     * @return StatusIdentifier
     */
    public function statusId(): StatusIdentifier
    {
        return $this->statusId;
    }

    /**
     * @return Sort
     */
    public function sort(): Sort
    {
        return $this->sort;
    }

    /**
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        return [
            'taskId' => (string)$this->id,
            'statusId' => (string)$this->statusId,
            'sort' => $this->sort->toInt()
        ];
    }
}
