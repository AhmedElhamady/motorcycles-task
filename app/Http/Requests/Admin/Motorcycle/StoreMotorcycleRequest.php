<?php

namespace App\Http\Requests\Admin\Motorcycle;

use App\Models\Motorcycle;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class StoreMotorcycleRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()->can('create', Motorcycle::class);
    }

    public function rules(): array
    {
        $brandRule = Rule::exists('brands', 'id');

        if ($this->user()->isDataEntry()) {
            $brandRule->whereIn('id', $this->user()->brandIds()->all());
        }

        $rules = [
            'brand_id' => ['required', 'integer', $brandRule],
            'category_id' => ['required', 'integer', Rule::exists('categories', 'id')],
            'name' => ['required', 'array'],
            'price' => ['required', 'numeric', 'min:0'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp', 'max:2048'],
            'is_active' => ['nullable', 'boolean'],
        ];

        foreach (array_keys(LaravelLocalization::getSupportedLocales()) as $locale) {
            $rules['name.' . $locale] = ['required', 'string', 'max:255'];
            $rules['description.' . $locale] = ['nullable', 'string'];
        }

        return $rules;
    }
}
