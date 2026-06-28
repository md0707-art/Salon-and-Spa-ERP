<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class VisitHistory extends Model
{
    use HasFactory;

    protected $table = 'visit_history';

    protected $fillable = [
        'customer_id', 'service_id', 'staff_id', 'visit_date', 'feedback'
    ];

    protected $dates = ['visit_date'];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function staff()
    {
        return $this->belongsTo(Staff::class);
    }
}
