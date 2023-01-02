<?php
declare(strict_types=1);

namespace App\Http\Task\Command\UpdateTask;

use App\Http\Controllers\Controller;
use App\Http\Exceptions\BadRequestHttpException;
use DateTimeImmutable;
use InvalidArgumentException;
use Psr\Log\LoggerInterface;
use Throwable;
use Todo\Task\Command\UpdateTask\UpdateTaskInput;
use Todo\Task\Command\UpdateTask\UpdateTaskInterface;
use Todo\Task\ValueObject\Cost;
use Todo\Task\ValueObject\Deadline;
use Todo\Task\ValueObject\Detail;
use Todo\Task\ValueObject\Name;
use Todo\Task\ValueObject\StatusIdentifier;
use Todo\Task\ValueObject\TaskId;

class UpdateTaskAction extends Controller
{
    /**
     * @var UpdateTaskInterface
     */
    public UpdateTaskInterface $updateTask;

    /**
     * @var LoggerInterface
     */
    public LoggerInterface $logger;

    /**
     * @param UpdateTaskInterface $updateTask
     * @param LoggerInterface $logger
     */
    public function __construct(
        UpdateTaskInterface $updateTask,
        LoggerInterface $logger
    )
    {
        $this->updateTask = $updateTask;
        $this->logger = $logger;
    }

    /**
     * @param UpdateTaskRequest $request
     * @return void
     */
    public function __invoke(UpdateTaskRequest $request)
    {
        try {
            try {
                $input = new UpdateTaskInput(
                    new TaskId($request->id()),
                    new Name($request->name()),
                    new Cost((int)$request->cost()),
                    new Deadline(new DateTimeImmutable($request->deadline())),
                    new Detail($request->detail()),
                    new StatusIdentifier($request->statusId())
                );
            } catch (InvalidArgumentException $e) {
                $this->logger->error('Task update is failed.');
                throw new BadRequestHttpException();
            }

            $this->updateTask->process($input);

        } catch (Throwable $e) {
            $this->logger->error('Internal server error.');
        }
    }
}
