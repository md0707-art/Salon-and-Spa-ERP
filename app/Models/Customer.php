<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'email', 'phone', 'gender',
        'date_of_birth', 'address', 'registration_date', 'loyalty_points'
    ];

    protected $dates = ['date_of_birth', 'registration_date'];

    public function preferences()
    {
        return $this->hasOne(CustomerPreference::class);
    }

    public function visits()
    {
        return $this->hasMany(VisitHistory::class);
    }

    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }
}
