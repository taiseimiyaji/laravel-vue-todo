<?php
declare(strict_types=1);

namespace App\Http\Task\Query\GetAllTask;

use Illuminate\Foundation\Http\FormRequest;

class GetAllTaskRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array{
        return [];
    }

}