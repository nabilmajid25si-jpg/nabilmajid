<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $primaryKey = 'product_id';

    protected $fillable = [
        'name',
        'sku',
        'category',
        'price',
        'stock',
        'status',
    ];
}
