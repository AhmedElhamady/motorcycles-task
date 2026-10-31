<?php

namespace App\Http\Requests\Admin\Category;

use Illuminate\Foundation\Http\FormRequest;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class UpdateCategoryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()->can('manage-categories');
    }

    public function rules(): array
    {
        $rules = [
            'name' => ['required', 'array'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp', 'max:2048'],
        ];

        foreach (array_keys(LaravelLocalization::getSupportedLocales()) as $locale) {
            $rules['name.' . $locale] = ['required', 'string', 'max:255'];
        }

        return $rules;
    }
}
