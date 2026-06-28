<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreInventoryPurchaseRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'inventory_id' => 'required|exists:inventory_items,id',
            'supplier_name' => 'required|string|max:100',
            'quantity_added' => 'required|numeric|min:0.01',
            'purchase_price' => 'required|numeric|min:0',
            'purchase_date' => 'required|date',
            'invoice_number' => 'nullable|string|max:100',
        ];
    }
}
