<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAppointmentRequest extends FormRequest
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
        'customer_id' => 'required|exists:users,id',
        'service_id' => 'required|exists:services,id',
        'staff_id' => 'nullable|exists:staff,id',
        'appointment_date' => 'required|date|after_or_equal:today',
        'appointment_time' => 'required|date_format:H:i',
        'notes' => 'nullable|string|max:1000',
        'status' => 'required|in:pending,confirmed,canceled',
        'channel' => 'required|string|in:walk-in,online',

    ];
}

}
