<?php
declare(strict_types=1);

namespace App\Http\Task\Query\GetAllStatus;

use Illuminate\Foundation\Http\FormRequest;

class GetAllStatusRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [];
    }
}
