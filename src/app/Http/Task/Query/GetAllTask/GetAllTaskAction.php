<?php

declare(strict_types=1);
namespace App\Http\Task\Query\GetAllTask;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Response;
use Psr\Log\LoggerInterface;
use Throwable;
use App\Http\Controllers\Controller;
use Todo\Task\Query\GetAllTask\GetAllTaskInterface;
use Todo\Task\Query\TaskReadModel;

class GetAllTaskAction extends Controller
{
    private GetAllTaskInterface $getAllTaskUseCase;
    private LoggerInterface  $logger;

    public function __construct(
        GetAllTaskInterface $getAllTaskUseCase,
        LoggerInterface $logger
    )
    {
        $this->getAllTaskUseCase = $getAllTaskUseCase;
        $this->logger = $logger;
    }

    /**
     * @throws Throwable
     */
    public function __invoke()
    {

        try {
            $tasks = $this->getAllTaskUseCase->process();
        } catch (Throwable $e) {
            $this->logger->error('Read task failed.');
            throw $e;
        }
        return Response::json(
            array_map(static function (TaskReadModel $task): array{
                return [
                    'id' => $task->id(),
                    'name' => $task->name(),
                    'cost' => $task->cost(),
                    'deadline' => $task->deadline(),
                    'detail' => $task->detail(),
                    'statusId' => $task->statusId(),
                    'statusName' => $task->statusName()
                ];
            }, $tasks)
        );
    }
}
