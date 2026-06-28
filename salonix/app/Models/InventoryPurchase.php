<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryPurchase extends Model
{
    use HasFactory;

    protected $fillable = [
        'inventory_id',
        'supplier_name',
        'quantity_added',
        'purchase_price',
        'purchase_date',
        'invoice_number',
    ];
    
    protected $casts = [
    'purchase_date' => 'datetime',
       ];


    public function inventoryItem()
    {
        return $this->belongsTo(InventoryItem::class, 'inventory_id');
    }
}
