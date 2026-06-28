<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportTemplate extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type',
        'filters_json',
        'created_by',
    ];

    protected $casts = [
        'filters_json' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
