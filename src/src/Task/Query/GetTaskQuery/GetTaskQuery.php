<?php
declare(strict_types=1);

namespace Todo\Task\Query\GetTaskQuery;

use App\Models\Task;
use Psr\Log\LoggerInterface;
use Throwable;

class GetTaskQuery
{
    /**
     * @var LoggerInterface
     */
    private LoggerInterface $logger;

    /**
     * @var Task
     */
    private Task $task;

    /**
     * @param LoggerInterface $logger
     * @param Task $task
     */
    public function __construct
    (
        LoggerInterface $logger,
        Task $task
    )
    {
        $this->logger = $logger;
        $this->task = $task;
    }

    /**
     * @param GetTaskInputPort $input
     * @return array
     */
    public function process(GetTaskInputPort $input): array
    {
        try {
            $task = $this->task->newQuery()
                ->where('id', $input->id()->toInt())
                ->get();
            $this->logger->info($input->id()->toInt());
        } catch (Throwable $e){
            $this->logger->error((string)$e);
            return [];
        }
        return $task->toArray();
    }
}
