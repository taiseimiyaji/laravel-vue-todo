<?php
declare(strict_types=1);

namespace App\Adapters\Task;

use Todo\Task\Task;
use Todo\Task\TaskFactoryInterface;
use Todo\Task\ValueObject\Cost;
use Todo\Task\ValueObject\Deadline;
use Todo\Task\ValueObject\Detail;
use Todo\Task\ValueObject\TaskId;
use Todo\Task\ValueObject\TaskLabel;
use Todo\Task\ValueObject\Name;

class TaskFactory implements TaskFactoryInterface
{
    private \App\Models\Task $task;

    public function __construct(\App\Models\Task $task)
    {
        $this->task = $task;
    }

    public function newTask(TaskId $taskId, Name $taskName, Detail $taskDetail, Deadline $taskDeadline, TaskLabel $taskLabel, Cost $taskCost): Task
    {
        $task = $this->task->newQuery()->create([
        'task_id' => $taskId->toInt(),
        'task_name' => (string)$taskName,
        'task_label' => (string)$taskLabel,
        'task_cost' => $taskCost->toInt(),
        'task_deadline' => (string)$taskDeadline,
        'task_detail' => (string)$taskDetail,
        ]);
        return new Task(
            new TaskId($task->getAttribute('task_id')),
            new Name($task->getAttribute('task_name')),
            new TaskLabel((string)$task->getAttribute('task_label')),
            new Cost((int)$task->getAttribute('task_cost')),
            new Deadline((string)$task->getAttribute('task_deadline')),
            new Detail((string)$task->getAttribute('task_detail')),
        );
    }
}
