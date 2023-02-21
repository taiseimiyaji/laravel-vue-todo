<?php
declare(strict_types=1);

namespace Todo\Task\Command\UpdateTask;

use Psr\Log\LoggerInterface;
use Throwable;
use Todo\Task\Task;
use Todo\Task\TaskRepositoryInterface;

class UpdateTask implements UpdateTaskInterface
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
    )
    {
        $this->repository = $repository;
        $this->logger = $logger;
    }

    /**
     * @param UpdateTaskInputPort $input
     * @return Task
     * @throws Throwable
     */
    public function process(UpdateTaskInputPort $input): Task
    {
        try {
            $task = $this->repository->findById($input->id());

            $task->setName($input->name());
            $task->setDeadline($input->deadline());
            $task->setCost($input->costs());
            $task->setDetail($input->detail());
            $task->setSort($input->sort());

            $this->repository->save($task);
        } catch (Throwable $e) {
            $this->logger->error('Internal server error.');
            throw $e;
        }

        return $task;
    }
}
