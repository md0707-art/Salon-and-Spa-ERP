<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'category_id',
        'quantity',
        'unit',
        'low_stock_alert',
        'expiry_date',
        'status',
    ];

    protected $casts = [
        'expiry_date' => 'date',
    ];

    public function category()
    {
        return $this->belongsTo(InventoryCategory::class, 'category_id');
    }

    public function usages()
    {
        return $this->hasMany(InventoryUsage::class, 'inventory_id');
    }

    public function purchases()
    {
        return $this->hasMany(InventoryPurchase::class, 'inventory_id');
    }

    public function isLowStock()
    {
        return $this->quantity <= $this->low_stock_alert;
    }

    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

}
