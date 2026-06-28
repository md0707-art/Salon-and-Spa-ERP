<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'duration_minutes',
        'category_id',
        'status', // 'active' or 'inactive'
    ];

    /**
     * Category this service belongs to.
     */
    public function category()
    {
        return $this->belongsTo(ServiceCategory::class, 'category_id');
    }

    /**
     * Staff assigned to this service (Many-to-Many).
     */
    public function staff()
    {
        return $this->belongsToMany(Staff::class, 'service_staff', 'service_id', 'staff_id');
    }

    /**
     * Appointments booked for this service.
     */
    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }
}
