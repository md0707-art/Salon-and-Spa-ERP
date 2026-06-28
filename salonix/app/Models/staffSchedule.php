<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class staffSchedule extends Model
{
use HasFactory;

    protected $fillable = ['staff_id', 'day_of_week', 'start_time', 'end_time', 'is_off_day'];

    public function staff()
    {
        return $this->belongsTo(Staff::class);
    }
}
