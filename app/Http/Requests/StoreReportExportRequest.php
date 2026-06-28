<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreReportExportRequest extends FormRequest
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
               'type' => 'required|in:appointment,sales,staff,inventory,customer',
               'format' => 'required|in:pdf,excel',
               'file_path' => 'required|string',
               'generated_by' => 'required|integer|exists:users,id',
           ];
       }
}
