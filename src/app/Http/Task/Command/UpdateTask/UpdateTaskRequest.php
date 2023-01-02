<?php
declare(strict_types=1);

namespace App\Http\Task\Command\UpdateTask;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTaskRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return string[][]
     */
    public function rules(): array
    {
        return
            [
                'id' => ['nullable', 'string', 'max:26'],
                'name' => ['nullable', 'string', 'max:100'],
                'cost' => ['nullable', 'integer'],
                'deadline' => ['nullable', 'string', 'max:100'],
                'detail' => ['nullable', 'string', 'max:1000'],
                'statusId' => ['nullable', 'string']
            ];
    }

    public function id(): string
    {
        return $this->route('id');
    }

    public function name(): string
    {
        return $this->input('name');
    }

    public function cost(): string
    {
        return $this->input('cost');
    }

    public function deadline(): string
    {
        return $this->input('deadline');
    }

    public function detail(): string
    {
        return $this->input('detail');
    }

    public function statusId(): string
    {
        return $this->input('statusId');
    }
}
