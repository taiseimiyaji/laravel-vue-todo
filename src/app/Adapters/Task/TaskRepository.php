<?php
declare(strict_types=1);

namespace App\Adapters\Task;

use App\Models\Task;
use RuntimeException;
use Todo\Task\ValueObject\TaskId;
use Todo\Task\ValueObject\TaskCost;
use Todo\Task\ValueObject\TaskName;
use Todo\Task\ValueObject\TaskLabel;
use Todo\Task\ValueObject\TaskTodos;
use Todo\Task\ValueObject\TaskDetail;
use Todo\Task\TaskRepositoryInterface;
use Todo\Task\ValueObject\TaskDeadline;

class TaskRepository implements TaskRepositoryInterface
{
    private Task $task;

    public function __construct(Task $task)
    {
        $this->task = $task;
    }

    public function findById(int $id): ?\Todo\Task\ValueObject\Task
    {
        // TODO: クエリ処理
        $query = $this->task->newQuery()
            ->find($id);

        $task = new \Todo\Task\ValueObject\Task(
            new TaskId($query->getAttribute('task_id')),
            new TaskName($query->getAttribute('task_name')),
            new TaskLabel($query->getAttribute('task_label')),
            new TaskCost($query->getAttribute('task_cost')),
            new TaskDeadline($query->getattribute('task_deadline')),
            new TaskDetail($query->getAttribute('task_detail')),
            new TaskTodos($query->getAttribute('task_todos'))
        );
        return $task;
    }

    public function save(\Todo\Task\ValueObject\Task $task): \Todo\Task\ValueObject\Task
    {
        // TODO: 保存処理
        $result = $this->model->newQuery()
        ->firstOrNew([
            'task_id' => $task->taskId()->toInt(),
        ])
        ->fill([
            'task_name' => (string)$task->taskName(),
            'task_label' => (string)$task->taskLabel(),
            'task_cost' => $task->taskCost()->toInt(),
            'task_deadline' => (string)$task->taskDeadline(),
            'task_detail' => (string)$task->taskDetail(),
            'task_todos' => (string)$task->taskTodos()
        ])
        ->save();

        if($result === false){
            throw new RuntimeException('タスクを登録できませんでした。');
        }
        return $task;
    }

    public function delete(\Todo\Task\ValueObject\Task $task): void
    {
        // TODO: 削除処理
        $result = $this->task->newQuery()
        ->find($task->taskId())
        ->delete();
        if ($result === false){
            throw new RuntimeException('タスクを削除できませんでした。');
        };
    }
}