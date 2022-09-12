<?php
declare(strict_types=1);
namespace App\Http\Task\Command\DeleteTask;

use Illuminate\Foundation\Http\FormRequest;
use Todo\Task\ValueObject\TaskId;

class DeleteTaskRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
          //
        ];
    }

    public function id(): TaskId
    {
        return new TaskId($this->route('id'));
    }
    //inputの内容
}
