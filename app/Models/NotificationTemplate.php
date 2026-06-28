<?php

// app/Models/NotificationTemplate.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NotificationTemplate extends Model
{
    protected $fillable = [
        'title',
        'type',
        'content',
        'channel',
        'active',
    ];
}
