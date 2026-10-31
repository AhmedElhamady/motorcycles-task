<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEnquiryRequest extends FormRequest
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
     */
    public function rules(): array
    {
        return [
            'fullName' => ['required', 'string', 'max:255'],
            'email'    => ['required', 'email', 'max:255'],
            'phone'    => ['required', 'string', 'max:30'],
            'model'    => ['required', 'exists:motorcycles,id'],
            'message'  => ['nullable', 'string', 'max:2000'],
        ];
    }

    /**
     * Custom attribute names for nicer error messages.
     */
    public function attributes(): array
    {
        return [
            'fullName' => 'full name',
            'model'    => 'motorcycle',
        ];
    }

    /**
     * Custom messages (optional).
     */
    public function messages(): array
    {
        return [
            'model.exists' => 'The selected motorcycle is no longer available.',
        ];
    }
}
