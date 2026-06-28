<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreInventoryRequest extends FormRequest
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
    public function rules(): array
    {
        return [
            'name'=>'required|string|max:100',
            'category_id'=>'required|exists:inventory_categories,id',
            'quantity'=>'required|numeric|min:0',
            'unit'=>'required|string|max:20',
            'low_stock_alert'=>'required|numeric|min:0',
            'expiry_date'=>'nullable|date|after_or_equal:today',
            'status'=>'required|in:active,inactive',
        ];
    }
}
