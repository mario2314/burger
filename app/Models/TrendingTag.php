<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TrendingTag extends Model
{
    protected $fillable = ['label', 'sort_order'];
}