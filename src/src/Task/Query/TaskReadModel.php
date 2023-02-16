<?php
declare(strict_types=1);

namespace Todo\Task\Query;

class TaskReadModel
{
    private string $id;
    private string $name;
    private string $cost;
    private string $deadline;
    private string $detail;
    private string $statusId;
    private string $statusName;
    private string $sort;

    /**
     * @param string $id
     * @param string $name
     * @param string $cost
     * @param string $deadline
     * @param string $detail
     * @param string $statusId
     * @param string $statusName
     * @param string $sort
     */
    public function __construct(
        string $id,
        string $name,
        string $cost,
        string $deadline,
        string $detail,
        string $statusId,
        string $statusName,
        string $sort
    )
    {
        $this->id = $id;
        $this->name = $name;
        $this->cost = $cost;
        $this->deadline = $deadline;
        $this->detail = $detail;
        $this->statusId = $statusId;
        $this->statusName = $statusName;
        $this->sort = $sort;
    }

    public function id(): string
    {
        return $this->id;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function cost(): string
    {
        return $this->cost;
    }

    public function deadline(): string
    {
        return $this->deadline;
    }

    public function detail(): string
    {
        return $this->detail;
    }

    public function statusId(): string
    {
        return $this->statusId;
    }

    public function statusName(): string
    {
        return $this->statusName;
    }

    public function sort(): string
    {
        return $this->sort;
    }
}
