<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CustomerPreference extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id', 'preferred_staff', 'preferred_service'
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function staff()
    {
        return $this->belongsTo(Staff::class, 'preferred_staff');
    }

    public function service()
    {
        return $this->belongsTo(Service::class, 'preferred_service');
    }
}
