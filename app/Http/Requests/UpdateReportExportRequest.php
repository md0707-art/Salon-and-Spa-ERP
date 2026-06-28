<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateReportExportRequest extends FormRequest
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
             'type' => 'sometimes|in:appointment,sales,staff,inventory,customer',
             'file_path' => 'sometimes|string|max:255',
             'format' => 'sometimes|in:pdf,excel',
         ];
     }

}
