<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    protected $primaryKey = 'order_id';

    protected $fillable = [
        'order_number',
        'customer_name',
        'order_date',
        'total_amount',
        'status',
    ];
}
