<?php
declare(strict_types=1);

namespace App\Http\Task\Command\CreateTask;

use DateTimeImmutable;
use Illuminate\Foundation\Http\FormRequest;
use InvalidArgumentException;
use Todo\Task\ValueObject\Cost;
use Todo\Task\ValueObject\Deadline;
use Todo\Task\ValueObject\Detail;
use Todo\Task\ValueObject\Name;
use Todo\Task\ValueObject\StatusIdentifier;
use Todo\Task\ValueObject\TaskId;

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
            'task_name' => ['nullable', 'string', 'max:100'],
            'task_cost' => ['nullable', 'integer'],
            'task_deadline' => ['nullable', 'string', 'max:100'],
            'task_detail' => ['nullable', 'string', 'max:1000'],
            'task_status' => ['nullable', 'string']
        ];
    }

    /**
     * @return Name
     */
    public function taskName(): Name
    {
        return new Name($this->get('task_name', ''));
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
        try {
            return new Deadline(DateTimeImmutable::createFromFormat('Y-m-d', $this->get('task_deadline', '')));
        } catch (\Exception $e) {
            throw new InvalidArgumentException();
        }
    }

    /**
     * @return Detail
     */
    public function taskDetail(): Detail
    {
        return new Detail($this->get('task_detail', ''));
    }

    /**
     * @return StatusIdentifier
     */
    public function statusId(): StatusIdentifier
    {
        return new StatusIdentifier($this->input('status_id', ''));
    }
}
