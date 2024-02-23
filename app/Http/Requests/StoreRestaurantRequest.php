<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRestaurantRequest extends FormRequest
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
            'name' => 'required|min:3|max:120|unique:restaurants,name',
            'email' => 'required|email|unique:restaurants,email',
            'phone' => 'required|max:24|min:10',
            'address' => 'required|min:4',
            'image' => ['nullable', 'image', 'max:5000', 'mimes:jpeg,jpg,png,gif,webp'],
            'p_iva' => 'required|min:11|max:11|unique:restaurants,p_iva',
            'categories' => ['exists:categories,id', 'required']
        ];
    }
}
