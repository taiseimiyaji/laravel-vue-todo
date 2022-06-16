<?php
declare(strict_types=1);

namespace Todo\Task\ValueObject;

final class Task
{
    private TaskId $taskId;
    private TaskName $taskName;
    private TaskLabel $taskLabel;
    private TaskCost $taskCost;
    private TaskDeadline $taskDeadline;
    private TaskDetail $taskDetail;
    private TaskTodos $taskTodos;

    public function __construct(
        TaskId $taskId,
        TaskName $taskName,
        TaskLabel $taskLabel,
        TaskCost $taskCost,
        TaskDeadline $taskDeadline,
        TaskDetail $taskDetail,
        TaskTodos $taskTodos
    ) {
        $this->taskId = $taskId;
        $this->taskName = $taskName;
        $this->taskLabel = $taskLabel;
        $this->taskCost = $taskCost;
        $this->taskDeadline = $taskDeadline;
        $this->taskDetail = $taskDetail;
        $this->taskTodos = $taskTodos;
    }

    public function taskId(): TaskId
    {
        return $this->taskId;
    }
    public function taskName(): TaskName
    {
        return $this->taskName;
    }
    public function taskLabel(): TaskLabel
    {
        return $this->taskLabel;
    }
    public function taskCost(): TaskCost
    {
        return $this->taskCost;
    }
    public function taskDeadline(): TaskDeadline
    {
        return $this->taskDeadline;
    }
    public function taskDetail(): TaskDetail
    {
        return $this->taskDetail;
    }
    public function taskTodos(): TaskTodos
    {
        return $this->taskTodos;
    }
    protected function validate()
    {
        return;
    }

    public function toArray(): array
    {
        return[
            'task_id' => $this->taskId->toInt(),
            'task_name' => (string)$this->taskName,
            'task_label' => (string)$this->taskLabel,
            'task_cost' => $this->taskCost->toInt(),
            'task_deadline' => (string)$this->taskDeadline,
            'task_detail' => (string)$this->taskDetail,
            'task_todos' => (string)$this->taskTodos
        ];
    }
}
