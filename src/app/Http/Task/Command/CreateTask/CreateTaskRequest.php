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
use Todo\Task\ValueObject\TaskTodos;

class CreateTaskRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        return [
            'task_name' => ['required', 'string', 'max:100'],
            'task_label' => ['nullable', 'string', 'max:100'],
            'task_cost' => ['nullable', 'integer'],
            'task_deadline' => ['nullable', 'string', 'max:100'],
            'task_detail' => ['nullable', 'string', 'max:1000'],
            'task_todos' => ['nullable', 'string', 'max:1000']
        ];
    }

    public function taskId(): TaskId
    {
        return new TaskId($this->get('task_id', ''));
    }
    public function taskName(): TaskName
    {
        return new TaskName($this->get('task_name', ''));
    }
    public function taskLabel(): TaskLabel
    {
        return new TaskLabel($this->get('task_label', ''));
    }
    public function taskCost(): TaskCost
    {
        return new TaskCost($this->get('task_cost', ''));
    }
    public function taskDeadline(): TaskDeadline
    {
        return new TaskDeadline($this->get('task_deadline', ''));
    }
    public function taskDetail(): TaskDetail
    {
        return new TaskDetail($this->get('task_detail', ''));
    }
    public function taskTodos(): TaskTodos
    {
        return new TaskTodos($this->get('task_todos', ''));
    }
}