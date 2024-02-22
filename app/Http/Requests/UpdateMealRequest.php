<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UpdateMealRequest extends FormRequest
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
            'name' => ['required', 'min:2', 'max:120',Rule::unique('meals')->ignore($this->meal)->where('restaurant_id',Auth::user()->id) ],
            'price' => ['required', 'min:0.01', 'max:999.99'],
            'image' => ['nullable', 'image', 'max:512', 'mimes:jpeg,jpg,png,gif'],
            'description' => ['required', 'max:2000'],
            'is_active' => ['required']
        ];
    }
}
