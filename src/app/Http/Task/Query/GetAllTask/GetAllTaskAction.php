<?php

declare(strict_types=1);
namespace App\Http\Task\Query\GetAllTask;

use Throwable;
use App\Http\Controllers\Controller;
use Todo\Task\Query\GetAllTask\GetAllTaskInterface;

class GetAllTaskAction extends Controller
{
    private $getAllTaskUsecase;

    public function __construct(GetAllTaskInterface $getAllTaskUsecase)
    {
        $this->getAllTaskUsecase = $getAllTaskUsecase;
    }

    public function __invoke()
    {
        try {
            $taskCollection = $this->getAllTaskUsecase->findAll();
        } catch (Throwable $e) {
            throw $e;
        }
        return response()->json($taskCollection->toArray());
    }
}
