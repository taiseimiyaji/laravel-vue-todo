<?php
declare(strict_types=1);

namespace Todo\Task\Command\DeleteTask;

use App\Http\Exceptions\InternalServerErrorHttpException;
use Psr\Log\LoggerInterface;
use Throwable;
use Todo\Task\TaskRepositoryInterface;

/**
 * タスク削除のユースケース
 */
class DeleteTask implements DeleteTaskInterface
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
     * @param DeleteTaskInputPort $input
     * @return void
     */
    public function process(DeleteTaskInputPort $input): void
    {
        try {
            $this->repository->deleteById($input->id());
        } catch(Throwable $e) {
            $this->logger->error((string)$e);
            throw new InternalServerErrorHttpException();
        }
    }
}
