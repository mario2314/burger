<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HeroBadge extends Model
{
    protected $fillable = ['icon', 'color', 'title', 'subtitle', 'sort_order'];
}