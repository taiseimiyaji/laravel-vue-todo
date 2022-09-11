<?php
declare(strict_types=1);
namespace App\Http\Task\Command\DeleteTask;

use App\Http\Controllers\Controller;
use App\Http\Exceptions\InternalServerErrorHttpException;
use Psr\Log\LoggerInterface;
use Throwable;
use Todo\Task\Command\DeleteTask\DeleteTaskInput;
use Todo\Task\Command\DeleteTask\DeleteTaskInterface;

class DeleteTaskAction extends Controller
{
    private DeleteTaskInterFace $deleteTask;

    private LoggerInterface $logger;

    public function __construct(
        LoggerInterface $logger,
        DeleteTaskInterFace $deleteTask
    )
    {
        $this->logger = $logger;
        $this->deleteTask = $deleteTask;
    }

    public function __invoke(DeleteTaskRequest $request)
    {
        $input = new DeleteTaskInput($request->id());

        try {
            $this->deleteTask->process($input);
        } catch (Throwable $e) {
            $this->logger->error((string)$e);
            throw new InternalServerErrorHttpException();
        }
    }
}
