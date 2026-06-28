<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'email', 'phone', 'gender', 'photo', 'role', 'status', 'joining_date'
    ];

    public function services()
    {
        return $this->belongsToMany(Service::class, 'staff_services');
    }

    public function schedules()
    {
        return $this->hasMany(StaffSchedule::class);
    }

    public function performances()
    {
        return $this->hasMany(StaffPerformance::class);
    }
    protected $casts = [
        'joining_date' => 'date',
    ];
}
