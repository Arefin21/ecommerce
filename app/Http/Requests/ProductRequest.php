<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
    {
        return [
            'name'=>'required|max:255',
            'category_id'=>'required|exists:categories,id',
            'stock'=>'required|numeric',
            'price'=>'required|numeric|min:0',
            'discounted_price'=>'required|numeric|min:0',
            'featured_image'=>'required|image',
            'others_image.*'=>'image|nullable',
            'product_size.*'=>'required'
        ];
    }
}
