<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PosTransaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'appointment_id',
        'customer_id',
        'total_amount',
        'discount',
        'loyalty_points_used',
        'final_amount',
        'payment_method',
        'payment_status',
        'invoice_number',
        'transaction_date',
    ];

    // Add any relationships if necessary (optional)
}
