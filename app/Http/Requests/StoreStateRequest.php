<?php

namespace App\Http\Requests;
use App\Traits\ConvertsCamelToSnake;
use Illuminate\Foundation\Http\FormRequest;

class StoreStateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    use ConvertsCamelToSnake;
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'state_code'     => ['required', 'numeric', 'max:500'],
            'state_name'    => ['required','string','max:100']
        ];
    }
    protected function prepareForValidation(): void
    {
        // Convert camelCase to snake_case before validation
        $this->merge(
            $this->convertCamelToSnake($this->all())
        );

        // Ensure inforce has a default value if not set
        if (!$this->has('inforce')) {
            $this->merge(['inforce' => true]);
        }
    }
}
