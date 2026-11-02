<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    protected $fillable = [
        'category_id',
        'title',
        'slug',
        'content',
        'status',
    ];

    // Relasi: Post milik satu Category.
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    // Query scope Eloquent: hanya post yang sudah terbit.
    public function scopePublished($query)
    {
        return $query->where('status', 'Published');
    }
}
