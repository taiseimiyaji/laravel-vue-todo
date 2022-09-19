<?php
declare(strict_types=1);

namespace App\Http\Task\Command\CreateTask;

use Illuminate\Foundation\Http\FormRequest;
use Todo\Task\ValueObject\Cost;
use Todo\Task\ValueObject\Deadline;
use Todo\Task\ValueObject\Detail;
use Todo\Task\ValueObject\TaskId;
use Todo\Task\ValueObject\TaskLabel;
use Todo\Task\ValueObject\Name;

class CreateTaskRequest extends FormRequest
{
    /**
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return string[][]
     */
    public function rules(): array
    {
        return [
            'task_id' => ['nullable', 'string'],
            'task_name' => ['nullable', 'string', 'max:100'],
            'task_label' => ['nullable', 'string', 'max:100'],
            'task_cost' => ['nullable', 'integer'],
            'task_deadline' => ['nullable', 'string', 'max:100'],
            'task_detail' => ['nullable', 'string', 'max:1000'],
        ];
    }

    /**
     * @return TaskId
     */
    public function taskId(): TaskId
    {
        return new TaskId($this->get('task_id', ''));
    }

    /**
     * @return Name
     */
    public function taskName(): Name
    {
        return new Name($this->get('task_name', ''));
    }

    /**
     * @return TaskLabel
     */
    public function taskLabel(): TaskLabel
    {
        return new TaskLabel($this->get('task_label', ''));
    }

    /**
     * @return Cost
     */
    public function taskCost(): Cost
    {
        return new Cost($this->get('task_cost', ''));
    }

    /**
     * @return Deadline
     */
    public function taskDeadline(): Deadline
    {
        return new Deadline($this->get('task_deadline', ''));
    }

    /**
     * @return Detail
     */
    public function taskDetail(): Detail
    {
        return new Detail($this->get('task_detail', ''));
    }
}
