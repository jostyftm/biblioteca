<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class ReservationItem extends Pivot
{
    protected $fillable = [
        'book_id',
        'reservation_id'
    ];
}