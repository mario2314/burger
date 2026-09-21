<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = [
        'name', 'phone', 'email', 'guests',
        'date', 'time', 'notes', 'status'
    ];
}