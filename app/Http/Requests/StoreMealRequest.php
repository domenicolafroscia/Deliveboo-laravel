<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreMealRequest extends FormRequest
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
            'name' => ['required','min:2','max:120',Rule::unique('meals','name')->where(fn($query) => $query->where('restaurant_id',Auth::user()->restaurant->id))],
            'price' => ['required','min:0.01', 'max:999.99'],
            'image' => ['nullable','image', 'max:5000', 'mimes:jpeg,jpg,png,gif,webp'],
            'description' => ['required', 'max:2000'],
        ];
    }
    
}

