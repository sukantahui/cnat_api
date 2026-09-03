<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;

class StoreCycleUserRequest extends BaseRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return [
            // phone key — React may send camelCase but BaseRequest converts automatically
            'phone' => ['required', 'string', 'max:20'],
        ];
    }
}
