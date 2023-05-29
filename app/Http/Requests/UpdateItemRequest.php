<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateItemRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'nullable|string|min:3|max:500',
            'description' => 'nullable|string|max:500',
            'price' => 'nullable|numeric',
            'old_price' => 'nullable|numeric',
            'category_id' => 'nullable|integer',
            'image' => 'nullable|file|mimes:jpg,png',
        ];
    }
}
