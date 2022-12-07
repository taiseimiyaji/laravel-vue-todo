<?php
declare(strict_types=1);

namespace App\Adapters\Task\Query;

use App\Models\Status;
use App\Models\Task;
use Todo\Task\Query\GetAllTask\GetAllTaskInterface;
use Todo\Task\Query\TaskReadModel;

class GetAllTask implements GetAllTaskInterface
{
    private Task $task;

    private Status $status;

    public function __construct(
        Task $task,
        Status $status
    )
    {
        $this->task = $task;
        $this->status = $status;
    }

    /**
     * @return array<TaskReadModel>
     */
    public function process(): array
    {
        $taskModel = $this->task->newQuery()->get();


        return $taskModel->map(function (Task $task) {
            return new TaskReadModel(
                $task->getAttribute('id'),
                $task->getAttribute('name'),
                (string)$task->getAttribute('cost'),
                $task->getAttribute('deadline'),
                $task->getAttribute('detail'),
                $task->getAttribute('status_id'),
                $this->status->newQuery()->where('id', '=', $task->getAttribute('status_id'))->first()->name
            );
        })->toArray();
    }
}
