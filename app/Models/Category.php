<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Catatan: CRUD Category diproses dengan QUERY BUILDER (lihat CategoryController).
 * Model ini hanya dipakai untuk mendefinisikan relasi balik (Category hasMany Post)
 * supaya Post::with('category') pada CRUD Eloquent berfungsi.
 */
class Category extends Model
{
    protected $fillable = ['name', 'slug', 'description'];

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }
}
