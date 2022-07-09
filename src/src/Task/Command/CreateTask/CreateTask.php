<?php
declare(strict_types=1);

namespace Todo\Task\Command\CreateTask;

use Todo\Task\TaskFactory;
use App\Adapters\Task\TaskRepository;
use Todo\Task\ValueObject\Task;

class CreateTask implements CreateTaskInterface
{

    // private $factory;
    private $repository;
    // private $service;

    public function __construct(
        // TaskFactory $factory, // Factoryパターンがよくわかってない
        TaskRepository $repository,
        // TaskService $service  // Serviceもよくわかってない
    ) {
        // $this->factory = $factory;
        $this->repository = $repository;
        // $this->service = $service;
    }

    public function process(CreateTaskInputPort $inputPort, CreateTaskOutputPort $outputPort)
    {
        $task = new Task(
            $inputPort->id(),
            $inputPort->name(),
            $inputPort->label(),
            $inputPort->costs(),
            $inputPort->deadline(),
            $inputPort->detail(),
            $inputPort->todos()
        );

        $this->repository->save($task);

        $outputPort->output($task);
    }
}
