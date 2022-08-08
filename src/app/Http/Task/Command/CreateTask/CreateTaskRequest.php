<?php
declare(strict_types=1);

namespace App\Http\Task\Command\CreateTask;

use Illuminate\Foundation\Http\FormRequest;
use Todo\Task\ValueObject\TaskCost;
use Todo\Task\ValueObject\TaskDeadline;
use Todo\Task\ValueObject\TaskDetail;
use Todo\Task\ValueObject\TaskId;
use Todo\Task\ValueObject\TaskLabel;
use Todo\Task\ValueObject\TaskName;

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
     * @return TaskName
     */
    public function taskName(): TaskName
    {
        return new TaskName($this->get('task_name', ''));
    }

    /**
     * @return TaskLabel
     */
    public function taskLabel(): TaskLabel
    {
        return new TaskLabel($this->get('task_label', ''));
    }

    /**
     * @return TaskCost
     */
    public function taskCost(): TaskCost
    {
        return new TaskCost($this->get('task_cost', ''));
    }

    /**
     * @return TaskDeadline
     */
    public function taskDeadline(): TaskDeadline
    {
        return new TaskDeadline($this->get('task_deadline', ''));
    }

    /**
     * @return TaskDetail
     */
    public function taskDetail(): TaskDetail
    {
        return new TaskDetail($this->get('task_detail', ''));
    }
}
