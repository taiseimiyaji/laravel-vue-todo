<?php
declare(strict_types=1);

namespace App\Adapters\Task;

use Todo\Task\ValueObject\Task;
use Todo\Task\ValueObject\TaskId;
use Todo\Task\TaskFactoryInterface;
use Todo\Task\ValueObject\TaskCost;
use Todo\Task\ValueObject\TaskName;
use Todo\Task\ValueObject\TaskLabel;
use Todo\Task\ValueObject\TaskTodos;
use Todo\Task\ValueObject\TaskDetail;
use Todo\Task\ValueObject\TaskDeadline;

class TaskFactory implements TaskFactoryInterface
{
    private \App\Models\Task $task;

    public function __construct(\App\Models\Task $task)
    {
        $this->task = $task;
    }

    public function newTask(TaskId $taskId, TaskName $taskName, TaskDetail $taskDetail, TaskDeadline $taskDeadline, TaskLabel $taskLabel, TaskCost $taskCost, TaskTodos $taskTodos): Task
    {
        $task = $this->task->newQuery()->create([
        'task_id' => (string)$taskId,
        'task_name' => (string)$taskName,
        'task_label' => (string)$taskLabel,
        'task_cost' => $taskCost->toInt(),
        'task_deadline' => (string)$taskDeadline,
        'task_detail' => (string)$taskDetail,
        'task_todos' => (string)$taskTodos
        ]);
        return new Task(
            new TaskId($task->getAttribute('task_id')),
            new TaskName($task->getAttribute('task_name')),
            new TaskLabel((string)$task->getAttribute('task_label')),
            new TaskCost((int)$task->getAttribute('task_cost')),
            new TaskDeadline((string)$task->getAttribute('task_deadline')),
            new TaskDetail((string)$task->getAttribute('task_detail')),
            new TaskTodos((string)$task->getAttribute('task_todos'))
        );
    }

}