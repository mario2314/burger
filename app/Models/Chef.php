<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chef extends Model
{
    protected $fillable = [
        'name', 'role', 'experience', 'image',
        'instagram', 'facebook', 'twitter', 'is_active'
    ];
}