<?php

namespace App\Http\Requests\Admin\Brand;

use Illuminate\Foundation\Http\FormRequest;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class UpdateBrandRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()->can('update', $this->route('brand'));
    }

    public function rules(): array
    {
        $rules = [
            'name' => ['required', 'array'],
            'logo' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp', 'max:2048'],
            'is_active' => ['nullable', 'boolean'],
        ];

        foreach (array_keys(LaravelLocalization::getSupportedLocales()) as $locale) {
            $rules['name.' . $locale] = ['required', 'string', 'max:255'];
            $rules['description.' . $locale] = ['nullable', 'string'];
        }

        return $rules;
    }
}
