<?php
declare(strict_types=1);
namespace App\Http\Task\Command\CreateTask;

use App\Http\Controllers\Controller;
use App\Http\Exceptions\BadRequestHttpException;
use App\Http\Exceptions\InternalServerErrorHttpException;
use Illuminate\Http\JsonResponse;
use Psr\Log\LoggerInterface;
use Throwable;
use Todo\Task\Command\CreateTask\CreateTaskBadRequestException;
use Todo\Task\Command\CreateTask\CreateTaskInput;
use Todo\Task\Command\CreateTask\CreateTaskInterface;
use Todo\Task\Command\CreateTask\FailedCreateTaskException;

class CreateTaskAction extends Controller
{
    /**
     * @var CreateTaskInterface
     */
    private CreateTaskInterface $useCase;

    /**
     * @var LoggerInterface
     */
    private LoggerInterface $logger;

    /**
     * @param CreateTaskInterface $useCase
     * @param LoggerInterface $logger
     */
    public function __construct(
        CreateTaskInterface $useCase,
        LoggerInterface     $logger
    )
    {
        $this->useCase = $useCase;
        $this->logger = $logger;
    }

    /**
     * @param CreateTaskRequest $request
     * @return JsonResponse|void
     */
    public function __invoke(CreateTaskRequest $request)
    {
        try {
            try {
                $createTaskInput = new CreateTaskInput(
                    $request->taskName(),
                    $request->taskDetail(),
                    $request->taskDeadline(),
                    $request->taskCost(),
                    $request->statusId(),
                    $request->sort(),
                );
                $this->useCase->process($createTaskInput);
            } catch (CreateTaskBadRequestException $e) {
                $this->logger->error((string)$e);
                throw new BadRequestHttpException('create request is wrong');
            } catch (FailedCreateTaskException $e) {
                $this->logger->error((string)$e);
                throw new InternalServerErrorHttpException('Failed Create Task.');
            } catch (Throwable $e) {
                $this->logger->error((string)$e);
                throw new InternalServerErrorHttpException();
            }
        } catch (BadRequestHttpException $e) {
            $this->logger->error((string)$e);
            return $e->makeHttpErrorResponse();
        } catch (InternalServerErrorHttpException $e) {
            $this->logger->error((string)$e);
            throw $e;
        }
    }
}
