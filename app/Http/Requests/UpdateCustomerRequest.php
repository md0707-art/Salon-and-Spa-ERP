<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class updateCustomerRequest extends FormRequest
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
        $customerId=$this->route('customer');
        return [
            'name'=>'required|string|max:100',
            'email'=>'nullable|email:100|unique:customers,email,'.$customerId,
            'phone'=>'required|string|max:15|unique:customers,phone,'.$customerId,
            'gender'=>'required|in:Male,Female,Other',
            'date_of_birth'=>'nullable|date',
            'address'=>'nullable|string',
            'loyalty_points'=>'nullable|interger|min:0',
        ];
    }
}
