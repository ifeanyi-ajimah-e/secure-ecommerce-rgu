<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
            'customer_detail' => 'nullable|string',
            'order_items.*' => 'required|array',
            'order_items.*.product_id' => 'required|numeric|exists:products,id',
            'order_items.*.product_quantity' => 'required|numeric',
            'order_items.*.item_unit_price' => 'required|numeric',
            'payment_evidence' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }
}
