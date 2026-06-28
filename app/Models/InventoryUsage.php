<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryUsage extends Model
{
    use HasFactory;

    protected $fillable = [
        'inventory_id',
        'service_id',
        'staff_id',
        'quantity_used',
        'used_on',
    ];

    public function inventoryItem()
    {
        return $this->belongsTo(InventoryItem::class, 'inventory_id');
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
