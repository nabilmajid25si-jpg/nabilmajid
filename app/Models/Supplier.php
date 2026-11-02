<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Catatan: CRUD Supplier diproses dengan QUERY BUILDER (lihat SupplierController).
 * Model ini hanya mendefinisikan relasi balik (Supplier hasMany Purchase)
 * agar Purchase::with('supplier') pada CRUD Eloquent berfungsi.
 */
class Supplier extends Model
{
    protected $fillable = ['name', 'phone', 'email', 'address'];

    public function purchases(): HasMany
    {
        return $this->hasMany(Purchase::class);
    }
}
