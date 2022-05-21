<?php
declare(strict_types=1);

namespace Todo\Task\ValueObject;

use DateTimeImmutable;

final class Task
{
    private int $taskId;
    private TaskName $taskName;
    private string $taskLabel;
    private int $taskCost;
    private string $taskDeadline;
    private TaskDetail $taskDetail;
    private string $taskTodos;

    public function __construct(
        int $taskId,
        TaskName $taskName,
        string $taskLabel,
        int $taskCost,
        string $taskDeadline,
        TaskDetail $taskDetail,
        string $taskTodos
    ) {
        $this->taskId = $taskId;
        $this->taskName = $taskName;
        $this->taskLabel = $taskLabel;
        $this->taskCost = $taskCost;
        $this->taskDeadline = $taskDeadline;
        $this->taskDetail = $taskDetail;
        $this->taskTodos = $taskTodos;
    }

    protected function validate()
    {
        return;
    }

    public function toArray(): array
    {
        return[
            'task_id' => (int)$this->taskId,
            'task_name' => (string)$this->taskName,
            'task_label' => (string)$this->taskLabel,
            'task_cost' => (int)$this->taskCost,
            'task_deadline' => (string)$this->taskDeadline,
            'task_detail' => (string)$this->taskDetail,
            'task_todos' => (string)$this->taskTodos
        ];
    }
}
