<?php
declare(strict_types=1);

namespace App\Http\Task\Command\UpdateSort;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSortRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [];
    }

    /**
     * @return array
     */
    public function tasks(): array
    {
        return $this->input();
    }
}
