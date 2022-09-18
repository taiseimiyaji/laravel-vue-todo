<?php
declare(strict_types=1);

namespace App\Http\Task\Query\GetTask;

use App\Http\Controllers\Controller;;

use Illuminate\Http\JsonResponse;
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

    public function __construct
    (
        LoggerInterface $logger,
        GetTaskQuery $query
    )
    {
        $this->logger = $logger;
        $this->query = $query;
    }

    /**
     * @throws Throwable
     */
    public function __invoke(GetTaskQueryRequest $request): JsonResponse
    {
        try {
            $input = new GetTaskInput(
                new TaskId((string)$request->id())
            );
            $task = $this->query->process($input);
        }catch (Throwable $e){
            $this->logger->error((string)$e);
            throw $e;
        }
        return response()->json($task);
    }
}
