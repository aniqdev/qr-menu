<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreItemRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:500',
            'description' => 'nullable|string|max:500',
            'price' => 'nullable|numeric',
            'old_price' => 'nullable|numeric',
            'volume' => 'nullable|string|max:255',
            'category_id' => 'nullable|integer',
            'image' => 'nullable|file|mimes:jpg,png,webp',
        ];
    }
}
