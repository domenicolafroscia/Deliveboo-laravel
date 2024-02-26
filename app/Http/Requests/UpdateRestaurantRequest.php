<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRestaurantRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'email' => 'required', 'email', Rule::unique('restaurants')->ignore($this->restaurant),
            'phone' => 'required|max:24|min:10',
            'address' => 'required|min:4',
            'image' => ['nullable', 'image', 'max:5000', 'mimes:jpeg,jpg,png,gif,webp'],
            'categories' => ['exists:categories,id', 'required']
        ];
    }
}
