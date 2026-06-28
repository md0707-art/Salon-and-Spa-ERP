<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDashboardsnapshotRequest extends FormRequest
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
            'kpi_name' => 'required|string|max:100',
            'kpi_value' => 'required|numeric',
            'date_range' => 'required|string|max:50',
            'snapshot_date' => 'required|date',
            'created_by' => 'required|integer|exists:users,id',
        ];
    }
}
