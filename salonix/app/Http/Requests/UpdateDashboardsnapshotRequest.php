<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDashboardsnapshotRequest extends FormRequest
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
             'kpi_value' => 'sometimes|numeric',
             'date_range' => 'sometimes|string|max:50',
             'snapshot_date' => 'sometimes|date',
         ];
     }

}
