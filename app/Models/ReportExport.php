<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class ReportExport extends Model
{
    use HasFactory;
    protected $fillable = [
        'type',
        'generated_by',
        'file_path',
        'format',
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'generated_by');
    }
}
