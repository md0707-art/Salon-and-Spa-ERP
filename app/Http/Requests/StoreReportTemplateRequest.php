<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreReportTemplateRequest extends FormRequest
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
             'name' => 'required|string|max:100',
             'type' => 'required|in:appointment,sales,staff,inventory',
             'filters_json' => 'required|json',
             'created_by' => 'required|exists:users,id',
         ];
     }

}
