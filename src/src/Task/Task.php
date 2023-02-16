<?php
declare(strict_types=1);

namespace Todo\Task;

use Todo\Task\Sort\ValueObject\Sort;
use Todo\Task\ValueObject\Cost;
use Todo\Task\ValueObject\Deadline;
use Todo\Task\ValueObject\Detail;
use Todo\Task\ValueObject\Name;
use Todo\Task\ValueObject\TaskId;

/**
 * タスクエンティティ
 *
 * プロパティの更新についてはToDoリストというドメイン上セッターを用意している
 */
final class Task
{
    private TaskId $id;
    private Name $name;
    private Detail $detail;
    private ?Deadline $deadline;
    private Cost $cost;
    private Status $status;
    private Sort $sort;

    /**
     * @param TaskId $id
     * @param Name $name
     * @param Cost $cost
     * @param ?Deadline $deadline
     * @param Detail $detail
     * @param Status $status
     * @param Sort $sort
     */
    public function __construct(
        TaskId    $id,
        Name      $name,
        Cost      $cost,
        ?Deadline $deadline,
        Detail    $detail,
        Status $status,
        Sort $sort
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->cost = $cost;
        $this->deadline = $deadline;
        $this->detail = $detail;
        $this->status = $status;
        $this->sort = $sort;
    }

    public function taskId(): TaskId
    {
        return $this->id;
    }
    public function name(): Name
    {
        return $this->name;
    }
    public function cost(): Cost
    {
        return $this->cost;
    }
    public function deadline(): ?Deadline
    {
        return $this->deadline;
    }
    public function detail(): Detail
    {
        return $this->detail;
    }

    public function status(): Status
    {
        return $this->status;
    }

    public function sort(): Sort
    {
        return $this->sort;
    }

    public function setName(Name $name): void
    {
        $this->name = $name;
    }

    public function setDetail(Detail $detail): void
    {
        $this->detail = $detail;
    }

    public function setDeadline(Deadline $deadline): void
    {
        $this->deadline = $deadline;
    }

    public function setCost(Cost $cost): void
    {
        $this->cost = $cost;
    }

    public function setStatus(Status $status): void
    {
        $this->status = $status;
    }

    public function setSort(Sort $sort): void
    {
        $this->sort = $sort;
    }

    public function toArray(): array
    {
        return[
            'id' => (string)$this->id,
            'name' => (string)$this->name,
            'cost' => $this->cost->toInt(),
            'deadline' => (string)$this->deadline,
            'detail' => (string)$this->detail,
            'status' => (string)$this->status->name(),
            'sort' => $this->sort->toInt(),
        ];
    }
}
