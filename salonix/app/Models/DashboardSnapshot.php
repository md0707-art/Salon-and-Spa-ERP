<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DashboardSnapshot extends Model
{
    use HasFactory;

    protected $fillable = [
        'kpi_name',
        'kpi_value',
        'date_range',
        'snapshot_date',
        'created_by',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
