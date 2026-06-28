<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStaffRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; 
    }

    public function rules(): array
    {
        return [
            'name'         => 'required|string|max:100',
            'email'        => 'required|email|unique:staff,email',
            'phone'        => 'required|string|max:20',
            'gender'       => 'required|in:male,female,other',
            'photo'        => 'nullable|image|max:2048',
            'role'         => 'required|in:stylist,therapist,admin',
            'status'       => 'required|in:active,inactive,on_leave',
            'joining_date' => 'required|date',
        ];
    }
}
