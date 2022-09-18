<?php

declare(strict_types=1);
namespace App\Http\Task\Query\GetAllTask;

use Psr\Log\LoggerInterface;
use Throwable;
use App\Http\Controllers\Controller;
use Todo\Task\Query\GetAllTask\GetAllTaskInterface;

class GetAllTaskAction extends Controller
{
    private $getAllTaskUsecase;
    private LoggerInterface  $logger;

    public function __construct(
        GetAllTaskInterface $getAllTaskUsecase,
        LoggerInterface $logger
    )
    {
        $this->getAllTaskUsecase = $getAllTaskUsecase;
        $this->logger = $logger;
    }

    public function __invoke()
    {
        $this->logger->error('GetAllTaskAction');
        try {
            $taskCollection = $this->getAllTaskUsecase->findAll();
        } catch (Throwable $e) {
            throw $e;
        }
        return response()->json($taskCollection->toArray());
    }
}
