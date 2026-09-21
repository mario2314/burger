<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HeroStat extends Model
{
    protected $fillable = ['number', 'suffix', 'label', 'sort_order'];
}