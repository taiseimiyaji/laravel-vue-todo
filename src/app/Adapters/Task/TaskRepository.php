<?php
declare(strict_types=1);

namespace App\Adapters\Task;

use App\Http\Exceptions\NotFoundHttpException;
use Psr\Log\LoggerInterface;
use RuntimeException;
use Throwable;
use Todo\Task\Status;
use Todo\Task\Task;
use Todo\Task\TaskRepositoryInterface;
use Todo\Task\ValueObject\Cost;
use Todo\Task\ValueObject\Deadline;
use Todo\Task\ValueObject\Detail;
use Todo\Task\ValueObject\Name;
use Todo\Task\ValueObject\StatusIdentifier;
use Todo\Task\ValueObject\TaskId;
use TypeError;

class TaskRepository implements TaskRepositoryInterface
{
    private \App\Models\Task $task;
    private \App\Models\Status $status;
    private LoggerInterface $logger;

    /**
     * @param \App\Models\Task $task
     * @param \App\Models\Status $status
     * @param LoggerInterface $logger
     */
    public function __construct(
        \App\Models\Task $task,
        \App\Models\Status $status,
        LoggerInterface $logger
    )
    {
        $this->task = $task;
        $this->status = $status;
        $this->logger = $logger;
    }

    /**
     * @param TaskId $id
     * @return Task
     */
    public function findById(TaskId $id): Task
    {
        /* @var \App\Models\Task $task */
        $task = $this->task->newQuery()
            ->where('id', '=', (string)$id)
            ->first();

        if (!$task) {
            $this->logger->error('Task not found.');
            throw new NotFoundHttpException('Task not found');
        }
        if (!$task instanceof Task) {
            throw new TypeError();
        }

        $status = $this->status->newQuery()
            ->where('id', '=', $task->getAttribute('status_id'))
            ->first();

        if (!$status) {
           $this->logger->error('Status not found.');
           throw new NotFoundHttpException('Status not Found.');
        }

        return new Task(
            new TaskId($task->getAttribute('id')),
            new Name($task->getAttribute('name')),
            new Cost($task->getAttribute('cost')),
            new Deadline($task->getAttribute('deadline')),
            new Detail($task->getAttribute('detail')),
            new Status(
                $status->getAttribute('id'),
                $status->getAttribute('name')
            ),
        );
    }

    /**
     * @param StatusIdentifier $id
     * @return Status
     */
    public function getStatusById(StatusIdentifier $id): Status
    {
        $status = $this->status->newQuery()
            ->where('id', '=', $id)
            ->first();
        if($status === null){
            throw new RuntimeException('not found status', 404);
        }
        return new Status(
            $status->getAttribute('id'),
            $status->getAttribute('name')
        );
    }

    /**
     * @param Task $task
     */
    public function save(Task $task): void
    {
        $result = $this->task->newQuery()
            ->firstOrNew([
                'id' => (string)$task->taskId(),
            ])
            ->fill([
                'name' => (string)$task->name(),
                'detail' => (string)$task->detail(),
                'deadline' => $task->deadline(),
                'cost' => $task->cost()->toInt(),
                'status_id' => (string)$task->status()->id()
            ])
            ->save();

        if($result === false){
            throw new RuntimeException('タスクを登録できませんでした。');
        }
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
            $this->task->newQuery()
                ->where('id', (string)$id)
                ->delete();
        } catch (Throwable $e){
            $this->logger->error((string)$e);
            throw $e;
        }
    }
}
