<?php
declare(strict_types=1);

namespace Todo\Task\Command\CreateTask;

use Psr\Log\LoggerInterface;
use Todo\Task\TaskFactoryInterface;
use Todo\Task\TaskRepositoryInterface;
use Todo\Task\ValueObject\Task;

class CreateTask implements CreateTaskInterface
{
    /**
     * @var TaskFactoryInterface
     */
    private TaskFactoryInterface $factory;

    /**
     * @var TaskRepositoryInterface
     */
    private TaskRepositoryInterface $repository;

    /**
     * @var LoggerInterface
     */
    private LoggerInterface $logger;

    /**
     * @param TaskFactoryInterface $factory
     * @param TaskRepositoryInterface $repository
     * @param LoggerInterface $logger
     */
    public function __construct(
        TaskFactoryInterface $factory,
        TaskRepositoryInterface $repository,
        LoggerInterface $logger
    ) {
        $this->factory = $factory;
        $this->repository = $repository;
        $this->logger = $logger;
    }

    /**
     * @param CreateTaskInputPort $inputPort
     * @return void
     */
    public function process(CreateTaskInputPort $inputPort): void
    {
        $taskId = $inputPort->id();
        $taskName = $inputPort->name();
        $taskLabel = $inputPort->label();
        $taskCost = $inputPort->costs();
        $taskDeadline = $inputPort->deadline();
        $taskDetail = $inputPort->detail();

        $task =new Task(
            $taskId,
            $taskName,
            $taskLabel,
            $taskCost,
            $taskDeadline,
            $taskDetail,
        );
        $this->repository->save($task);

    }
}
