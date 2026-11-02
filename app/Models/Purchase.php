<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Purchase extends Model
{
    protected $fillable = [
        'supplier_id',
        'product_id',
        'quantity',
        'unit_cost',
        'purchase_date',
        'status',
    ];  

    protected $casts = [
        'purchase_date' => 'date',
        'unit_cost' => 'decimal:2',
    ];

    public function supplier(): BelongsTo
    {
        return $this->belongsTo(Supplier::class);
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'product_id', 'product_id');
    }

  
    public function scopeReceived($query)
    {
        return $query->where('status', 'Received');
    }
}
