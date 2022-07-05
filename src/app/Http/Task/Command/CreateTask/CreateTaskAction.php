<?php

declare(strict_types=1);
namespace App\Http\Task\Command\CreateTask;

use App\Http\Controllers\Controller;
use InvalidArgumentException;
use Todo\Task\Command\CreateTask\CreateTaskInput;
use Todo\Task\Command\CreateTask\CreateTaskInterface;

class CreateTaskAction extends Controller
{
    private CreateTaskInterface $createTaskUsecase;

    public function __construct(CreateTaskInterface $createTaskUsecase)
    {
        $this->createTaskUsecase = $createTaskUsecase;
    }

    public function __invoke(CreateTaskRequest $request)
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
            $response = new CreateTaskResponse();
            $this->createTaskUsecase->process($createTaskInput, $response);
        } catch (InvalidArgumentException $e) {
            throw new CreateTaskBadRequestException('create request is wrong');
        }
        return response()->json($response->task()->toArray());
    }
}
