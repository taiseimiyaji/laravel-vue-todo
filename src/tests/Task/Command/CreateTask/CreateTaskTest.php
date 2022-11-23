<?php

declare(strict_types=1);
namespace Tests\Task\Command\CreateTask;

use App\Adapters\Task\TaskFactory;
use App\Adapters\Task\TaskRepository;
use Illuminate\Support\Facades\DB;
use Mockery;
use Symfony\Component\Uid\Ulid;
use Tests\TestCase;
use Todo\Task\Command\CreateTask\CreateTask;
use Todo\Task\Command\CreateTask\CreateTaskInput;
use Todo\Task\Command\CreateTask\CreateTaskInterface;
use Todo\Task\Status;
use Todo\Task\Task;
use Todo\Task\TaskFactoryInterface;
use Todo\Task\TaskRepositoryInterface;
use Todo\Task\ValueObject\Cost;
use Todo\Task\ValueObject\Deadline;
use Todo\Task\ValueObject\Detail;
use Todo\Task\ValueObject\StatusIdentifier;
use Todo\Task\ValueObject\TaskId;
use Todo\Task\ValueObject\Name;

class CreateTaskTest extends TestCase
{
    private TaskRepositoryInterface $repositoryMock;
    private TaskFactoryInterface $factoryMock;
    private Task $task;

    public function setUp(): void
    {
        parent::setUp();
        $this->task = new Task(
            new TaskId(Ulid::generate()),
            new Name('testTask'),
            new Cost(0),
            null,
            new Detail(''),
            new Status(Ulid::generate(), Status::STATUS_DEFAULT)
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
     * 正常系: 正常にタスクが作成されること
     *
     * ユースケース単位でのテスト。モックを使用しない。
     *
     * @depends test__construct
     * @return void
     */
    public function testProcess(): void
    {
        $task = clone $this->task;
        DB::beginTransaction();
        $useCase = $this->app->make(CreateTaskInterface::class);
        $taskName = new Name('test');
        $taskDetail = new Detail('detail');
        $taskDeadline = null;
        $taskCost = new Cost(1);
        $taskStatusId = new StatusIdentifier('01GJD2P2DH49F297EDB8W89Z21');

        $input = new CreateTaskInput(
            $taskName,
            $taskDetail,
            $taskDeadline,
            $taskCost,
            $taskStatusId
        );

        $useCase->process($input);

        $result = DB::table('task')
            ->first()
            ->status_id;

//        DB::commit();

        $this->assertSame((string)$taskStatusId, $result);
        DB::rollBack();
    }
}
