<?php
declare(strict_types=1);

namespace Todo\Task\Command\CreateTask;

use DateTimeImmutable;
use InvalidArgumentException;
use Psr\Log\LoggerInterface;
use RuntimeException;
use Todo\Task\TaskFactoryInterface;
use Todo\Task\TaskRepositoryInterface;
use Todo\Task\ValueObject\Deadline;

class CreateTask implements CreateTaskInterface
{
    /**
     * @var TaskRepositoryInterface
     */
    private TaskRepositoryInterface $repository;

    /**
     * @var TaskFactoryInterface
     */
    private TaskFactoryInterface $factory;

    /**
     * @var LoggerInterface
     */
    private LoggerInterface $logger;

    /**
     * @param TaskRepositoryInterface $repository
     * @param TaskFactoryInterface $factory
     * @param LoggerInterface $logger
     */
    public function __construct(
        TaskRepositoryInterface $repository,
        TaskFactoryInterface $factory,
        LoggerInterface $logger
    ) {
        $this->repository = $repository;
        $this->factory = $factory;
        $this->logger = $logger;
    }

    /**
     * @param CreateTaskInputPort $input
     * @return void
     */
    public function process(CreateTaskInputPort $input): void
    {
        try {
            // エンティティの生成
            $task = $this->factory->createTask((string)$input->name());

            // 各種情報を設定
            $task->setDetail($input->detail());
            $task->setCost($input->costs());
            $task->setStatus($this->repository->getStatusById($input->statusId()));
            if(!$input->deadline() === null) {
                $task->setDeadline(new Deadline(new DateTimeImmutable()));
            }

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
