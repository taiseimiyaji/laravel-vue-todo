<?php
declare(strict_types=1);
namespace App\Http\Task\Command\CreateTask;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use InvalidArgumentException;
use Psr\Log\LoggerInterface;
use RuntimeException;
use Todo\Task\Command\CreateTask\CreateTaskInput;
use Todo\Task\Command\CreateTask\CreateTaskInterface;

class CreateTaskAction extends Controller
{
    private CreateTaskInterface $useCase;
    private LoggerInterface $logger;
    public function __construct(
        CreateTaskInterface $useCase,
        LoggerInterface     $logger
    )
    {
        $this->useCase = $useCase;
        $this->logger = $logger;
    }

    public function __invoke(CreateTaskRequest $request): JsonResponse
    {
        try {
            $createTaskInput = new CreateTaskInput(
                $request->taskId(),
                $request->taskName(),
                $request->taskDetail(),
                $request->taskDeadline(),
                $request->taskLabel(),
                $request->taskCost(),
                $request->taskTodos()
            );
            $this->useCase->process($createTaskInput);
        } catch (InvalidArgumentException $e) {
            throw new CreateTaskBadRequestException('create request is wrong', 403);
        } catch (RuntimeException $e) {
            $this->logger->error($e);
            throw new RuntimeException($e->getMessage());
        }
        return new JsonResponse(['Sample']);
    }
}
