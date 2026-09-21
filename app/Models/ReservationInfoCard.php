<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReservationInfoCard extends Model
{
    protected $fillable = ['icon', 'label', 'value', 'sort_order'];
}