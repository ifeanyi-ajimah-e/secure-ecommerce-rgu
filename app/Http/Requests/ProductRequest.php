<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'other_images.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'weight' => 'required|numeric',
            'description' => 'required|string|max:855',
            'price' => 'required',
            'amount_in_stock' => 'required|integer',
            'is_available' => 'required|integer',
            'brand_id' => 'required|integer|exists:brands,id',
            'category_id' => 'required|integer|exists:categories,id',
            'color' => 'required|string',
            'size' => 'required|string',
            'deal_status' => 'required|string',
        ];
    }
}
