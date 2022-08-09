<?php
declare(strict_types=1);

namespace Todo\Task\Command\CreateTask;

use InvalidArgumentException;
use Psr\Log\LoggerInterface;
use RuntimeException;
use Todo\Task\TaskRepositoryInterface;
use Todo\Task\ValueObject\Task;

class CreateTask implements CreateTaskInterface
{
    /**
     * @var TaskRepositoryInterface
     */
    private TaskRepositoryInterface $repository;

    /**
     * @var LoggerInterface
     */
    private LoggerInterface $logger;

    /**
     * @param TaskRepositoryInterface $repository
     * @param LoggerInterface $logger
     */
    public function __construct(
        TaskRepositoryInterface $repository,
        LoggerInterface $logger
    ) {
        $this->repository = $repository;
        $this->logger = $logger;
    }

    /**
     * @param CreateTaskInputPort $inputPort
     * @return void
     */
    public function process(CreateTaskInputPort $inputPort): void
    {
        try {
            $taskId = $inputPort->id();
            $taskName = $inputPort->name();
            $taskLabel = $inputPort->label();
            $taskCost = $inputPort->costs();
            $taskDeadline = $inputPort->deadline();
            $taskDetail = $inputPort->detail();

            $task = new Task(
                $taskId,
                $taskName,
                $taskLabel,
                $taskCost,
                $taskDeadline,
                $taskDetail,
            );
            $this->repository->save($task);
        } catch (InvalidArgumentException $e) {
            $this->logger->error((string)$e);
            throw new CreateTaskBadRequestException((string)$e);
        } catch (RuntimeException $e) {
            $this->logger->error((string)$e);
            throw new FailedCreateTaskException((string)$e);
        }
    }
}
