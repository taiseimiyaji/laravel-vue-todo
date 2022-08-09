<?php

declare(strict_types=1);
namespace Tests\Task\Command\CreateTask;

use App\Adapters\Task\TaskFactory;
use App\Adapters\Task\TaskRepository;
use Mockery;
use Tests\TestCase;
use Todo\Task\Command\CreateTask\CreateTask;
use Todo\Task\Command\CreateTask\CreateTaskInput;
use Todo\Task\Command\CreateTask\CreateTaskInterface;
use Todo\Task\TaskFactoryInterface;
use Todo\Task\TaskRepositoryInterface;
use Todo\Task\ValueObject\Task;
use Todo\Task\ValueObject\TaskCost;
use Todo\Task\ValueObject\TaskDeadline;
use Todo\Task\ValueObject\TaskDetail;
use Todo\Task\ValueObject\TaskId;
use Todo\Task\ValueObject\TaskLabel;
use Todo\Task\ValueObject\TaskName;

class CreateTaskTest extends TestCase
{
    private TaskRepositoryInterface $repositoryMock;
    private TaskFactoryInterface $factoryMock;
    private Task $task;

    public function setUp(): void
    {
        parent::setUp();
        $this->task = new Task(
            new TaskId('1'),
            new TaskName('testTask'),
            new TaskLabel('testLabel'),
            new TaskCost(1),
            new TaskDeadline('hoge'),
            new TaskDetail('testDetail'),
        );
        $this->repositoryMock = Mockery::mock(TaskRepositoryInterface::class);
        $this->factoryMock = Mockery::mock(TaskFactory::class, TaskFactoryInterface::class);
    }

    public function test__construct(): void
    {
        $this->app->instance(TaskRepository::class, $this->repositoryMock);
        $this->app->instance(TaskFactory::class, $this->factoryMock);
        $useCase = $this->app->make(CreateTaskInterface::class);
        $this->assertInstanceOf(CreateTask::class, $useCase);
    }

    /**
     * @depends test__construct
     * @return void
     */
    public function testProcess(): void
    {
        $task = clone $this->task;
//         $this->repositoryMock->shouldReceive('findById')
        // //            ->once()
//             ->andReturn($task);

        $this->repositoryMock->shouldReceive('save')
//            ->once()
            ->with(Mockery::on(function (Task $arg) use ($task) {
                $this->assertSame($task, $arg);
                return true;
            }));

        $this->app->instance(TaskRepository::class, $this->repositoryMock);
        $this->app->instance(TaskFactory::class, $this->factoryMock);
        $useCase = $this->app->make(CreateTaskInterface::class);
        $taskId = new TaskId('1');
        $taskName = new TaskName('test');
        $taskDetail = new TaskDetail('taskDetail');
        $taskDeadline = new TaskDeadline('hoge');
        $taskLabel = new TaskLabel('label');
        $taskCost = new TaskCost(1);

        $input = new CreateTaskInput(
            $taskId,
            $taskName,
            $taskDetail,
            $taskDeadline,
            $taskLabel,
            $taskCost,
        );

        $useCase->process($input);
    }
}
