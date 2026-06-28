<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class staffPerformance extends Model
{
    use HasFactory;

    protected $fillable = ['staff_id', 'date', 'clients_served', 'rating'];

    public function staff()
    {
        return $this->belongsTo(Staff::class);
    }
}
