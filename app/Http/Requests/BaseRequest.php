<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Traits\ConvertsCamelToSnake;

abstract class BaseRequest extends FormRequest
{
    use ConvertsCamelToSnake;

    /**
     * Prepare all inputs before validation.
     * Automatically converts camelCase to snake_case and applies defaults.
     */
    protected function prepareForValidation(): void
    {
        // ✅ Convert camelCase keys to snake_case
        $this->replace($this->convertCamelToSnake($this->all()));

        // ✅ Add global defaults if required
        $this->applyDefaultValues();
    }

    /**
     * Apply request-wide default values.
     * You can override this in child classes to add request-specific defaults.
     */
    protected function applyDefaultValues(): void
    {
        // Normalize booleans and apply default fallbacks
        $this->merge([
            // ✅ Convert truthy/falsey strings like "1", "true", "yes"
            'inforce'    => $this->boolean('inforce', true),
            'active'     => $this->boolean('active', true),

            // ✅ Attach the authenticated user's ID if available
            'created_by' => auth()->id() ?? null,
        ]);
    }
}
