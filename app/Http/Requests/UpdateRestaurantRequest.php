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
            'name' => 'required', 'min:3', 'max:120', Rule::unique('restaurants')->ignore($this->restaurant), 
            'email' => 'required', 'email', Rule::unique('restaurants')->ignore($this->restaurant),
            'phone' => 'required|max:15',
            'address' => 'required',
            'p_iva' => 'required', 'min:11', 'max:11', Rule::unique('restaurants')->ignore($this->restaurant),
            'categories' => ['exists:categories,id', 'required']
        ];
    }
}
