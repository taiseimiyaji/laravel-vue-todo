<?php
declare(strict_types=1);

namespace App\Adapters\Task;

use Exception;
use Psr\Log\LoggerInterface;
use RuntimeException;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Todo\Task\ValueObject\Task;
use Todo\Task\ValueObject\TaskId;
use Todo\Task\ValueObject\TaskCost;
use Todo\Task\ValueObject\TaskName;
use Todo\Task\ValueObject\TaskLabel;
use Todo\Task\ValueObject\TaskDetail;
use Todo\Task\TaskRepositoryInterface;
use Todo\Task\ValueObject\TaskDeadline;
use TypeError;

class TaskRepository implements TaskRepositoryInterface
{
    private \App\Models\Task $task;
    private LoggerInterface $logger;

    public function __construct(\App\Models\Task $task, LoggerInterface $logger)
    {
        $this->task = $task;
        $this->logger = $logger;
    }

    public function findById(int $id): Task
    {
        // TODO: クエリ処理
        $task = $this->task->newQuery()
            ->find($id);

        if(!$task instanceof Task) {
            throw new TypeError();
        }

        return $task;
    }

    public function save(Task $task): Task
    {
        $result = $this->task->newQuery()
            ->firstOrNew([
                'task_id' => (string)$task->taskId(),
            ])
            ->fill([
                'task_name' => (string)$task->taskName(),
                'task_label' => (string)$task->taskLabel(),
                'task_cost' => $task->taskCost()->toInt(),
                'task_deadline' => (string)$task->taskDeadline(),
                'task_detail' => (string)$task->taskDetail(),
            ])
            ->save();

        if($result === false){
            throw new RuntimeException('タスクを登録できませんでした。');
        }
        return $task;
    }

    public function delete(Task $task): void
    {
//        // TODO: 削除処理
//        $result = $this->task->newQuery()
//        ->find($task->taskId())
//        ->delete();
//        if ($result === false){
//            throw new RuntimeException('タスクを削除できませんでした。');
//        };
    }
}
