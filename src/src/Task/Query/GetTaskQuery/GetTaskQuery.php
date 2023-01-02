<?php
declare(strict_types=1);

namespace Todo\Task\Query\GetTaskQuery;

use App\Http\Exceptions\NotFoundHttpException;
use App\Models\Status;
use App\Models\Task;
use Psr\Log\LoggerInterface;
use Throwable;
use Todo\Task\Query\TaskReadModel;

class GetTaskQuery implements GetTaskQueryInterface
{
    /**
     * @var Task
     */
    private Task $task;

    /**
     * @var Status
     */
    private Status $status;

    /**
     * @var LoggerInterface
     */
    private LoggerInterface $logger;

    /**
     * @param LoggerInterface $logger
     * @param Task $task
     */
    public function __construct
    (
        Task $task,
        Status $status,
        LoggerInterface $logger
    )
    {
        $this->task = $task;
        $this->status = $status;
        $this->logger = $logger;
    }

    /**
     * @param GetTaskInputPort $input
     * @return TaskReadModel
     * @throws Throwable
     */
    public function process(GetTaskInputPort $input): TaskReadModel
    {
        try {
            $task = $this->task->newQuery()
                ->where('id', (string)$input->id())
                ->first();
            if ($task === null) {
                // TODO: 独自例外の作成
                throw new NotFoundHttpException('task is not found.');
            }
        }catch (NotFoundHttpException $e) {
            $this->logger->error((string)$e);
            throw $e;
        } catch (Throwable $e){
            $this->logger->error((string)$e);
            throw $e;
        }

        return new TaskReadModel(
            $task->getAttribute('id'),
            $task->getAttribute('name'),
            $task->getAttribute('detail'),
            $task->getAttribute('deadline'),
            (string)$task->getAttribute('cost'),
            $task->getAttribute('status_id'),
            $this->status->newQuery()->where('id', '=', $task->getAttribute('status_id'))->first()->name
        );
    }
}
