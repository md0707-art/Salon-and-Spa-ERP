<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAppointmentRequest extends FormRequest
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
        'customer_id' => 'nullable|exists:users,id',
        'customer_name' => 'required_without:customer_id|string|max:255',
        'customer_email' => 'required_without:customer_id|email|max:255',
        'customer_phone' => 'required_without:customer_id|string|max:20',

        'service_id' => 'required|exists:services,id',
        'staff_id' => 'nullable|exists:staff,id',
        'appointment_date' => 'required|date|after_or_equal:today',
        'appointment_time' => 'required|date_format:H:i',
        'notes' => 'nullable|string|max:1000',
    ];
     }

}
