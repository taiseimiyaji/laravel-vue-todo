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
            'name' => ['nullable', 'string', 'max:100'],
            'cost' => ['nullable', 'integer'],
            'deadline' => ['nullable', 'string', 'max:100'],
            'detail' => ['nullable', 'string', 'max:1000'],
            'statusId' => ['nullable', 'string']
        ];
    }

    /**
     * @return Name
     */
    public function taskName(): Name
    {
        return new Name($this->get('name', ''));
    }

    /**
     * @return Cost
     */
    public function taskCost(): Cost
    {
        return new Cost((int)$this->get('cost', ''));
    }

    /**
     * @return Deadline
     */
    public function taskDeadline(): Deadline
    {
        try {
            return new Deadline(DateTimeImmutable::createFromFormat('Y-m-d', $this->get('deadline', '')));
        } catch (\Exception $e) {
            throw new InvalidArgumentException();
        }
    }

    /**
     * @return Detail
     */
    public function taskDetail(): Detail
    {
        return new Detail($this->get('detail', ''));
    }

    /**
     * @return StatusIdentifier
     */
    public function statusId(): StatusIdentifier
    {
        return new StatusIdentifier($this->input('statusId', ''));
    }
}
