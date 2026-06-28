<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateInventoryUsageRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'inventory_id' => 'required|exists:inventory_items,id',
            'service_id' => 'required|exists:services,id',
            'staff_id' => 'required|exists:staff,id',
            'quantity_used' => 'required|numeric|min:0.01',
        ];
    }
}
