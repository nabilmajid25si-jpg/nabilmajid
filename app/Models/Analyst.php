<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Analyst extends Model
{
    protected $table = 'analysts';

    protected $primaryKey = 'analyst_id';

    protected $fillable = [
        'name',
        'email',
        'phone',
        'specialization',
        'hire_date',
        'status',
    ];
}
