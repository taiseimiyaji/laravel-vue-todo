<?php
declare(strict_types=1);

namespace App\Http\Task\Query\GetTask;

use Illuminate\Foundation\Http\FormRequest;

class GetTaskQueryRequest extends FormRequest
{
    /**
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array
     */
    public function rules(): array
    {
        return[];
    }

    /**
     * @return string
     */
    public function id(): string
    {
        return $this->route('id');
    }
}
