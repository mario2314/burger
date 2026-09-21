<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
    protected $fillable = [
        'category_id', 'name', 'description', 'price',
        'old_price', 'image', 'rating', 'reviews_count',
        'calories', 'prep_time', 'badge', 'badge_type',
        'tags', 'is_active'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}