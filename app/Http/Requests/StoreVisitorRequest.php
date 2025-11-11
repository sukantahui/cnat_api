<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreVisitorRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
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
            'name'     => 'required|string|max:255',
            'email'    => 'nullable|email|max:255',
            'interest' => 'required|string|max:255',
            'message'  => 'nullable|string|max:2000',

            // Optional meta fields if sent from frontend
            'ip_address'  => 'nullable|string|max:45',
            'browser'     => 'nullable|string|max:255',
            'device_type' => 'nullable|string|max:50',
            'page_url'    => 'nullable|url|max:2048',
            'referrer'    => 'nullable|url|max:2048',
        ];
    }
}
