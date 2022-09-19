<?php
declare(strict_types=1);

namespace App\Adapters\Task;

use Psr\Log\LoggerInterface;
use RuntimeException;
use Throwable;
use Todo\Task\Task;
use Todo\Task\TaskRepositoryInterface;
use Todo\Task\ValueObject\TaskId;
use TypeError;

class TaskRepository implements TaskRepositoryInterface
{
    private \App\Models\Task $task;
    private LoggerInterface $logger;

    /**
     * @param \App\Models\Task $task
     * @param LoggerInterface $logger
     */
    public function __construct(\App\Models\Task $task, LoggerInterface $logger)
    {
        $this->task = $task;
        $this->logger = $logger;
    }

    /**
     * @param int $id
     * @return Task
     */
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

    /**
     * @param Task $task
     * @return Task
     */
    public function save(Task $task): Task
    {
        $result = $this->task->newQuery()
            ->firstOrNew([
                'id' => (string)$task->taskId(),
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

    /**
     * @param TaskId $id
     * @return void
     * @throws Throwable
     */
    public function deleteById(TaskId $id): void
    {
        // TODO: 削除処理
        try {
            $result = $this->task->newQuery()
                ->where('task_id', $id->toInt())
                ->delete();
        } catch (Throwable $e){
            $this->logger->error((string)$e);
            throw $e;
        }
    }
}
