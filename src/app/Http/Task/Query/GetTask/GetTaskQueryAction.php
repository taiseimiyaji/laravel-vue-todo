<?php
declare(strict_types=1);

namespace App\Http\Task\Query\GetTask;

use App\Http\Controllers\Controller;;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Response;
use Psr\Log\LoggerInterface;
use Throwable;
use Todo\Task\Query\GetTaskQuery\GetTaskInput;
use Todo\Task\Query\GetTaskQuery\GetTaskQuery;
use Todo\Task\ValueObject\TaskId;

class GetTaskQueryAction extends Controller
{
    /**
     * @var GetTaskQuery
     */
    private GetTaskQuery $query;

    /**
     * @var LoggerInterface
     */
    private LoggerInterface $logger;

    /**
     * @param LoggerInterface $logger
     * @param GetTaskQuery $query
     */
    public function __construct
    (
        GetTaskQuery $query,
        LoggerInterface $logger
    )
    {
        $this->query = $query;
        $this->logger = $logger;
    }

    /**
     * @throws Throwable
     */
    public function __invoke(GetTaskQueryRequest $request): JsonResponse
    {
        try {
            $input = new GetTaskInput(
                new TaskId($request->id())
            );
            $task = $this->query->process($input);
        }catch (Throwable $e){
            $this->logger->error((string)$e);
            throw $e;
        }
        return Response::json(
            [
                'id' => $task->id(),
                'name' => $task->name(),
                'cost' => $task->cost(),
                'deadline' => $task->deadline(),
                'detail' => $task->detail(),
                'statusId' => $task->statusId(),
                'statusName' => $task->statusName()
            ]
        );
    }
}
