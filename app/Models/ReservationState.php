<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReservationState extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'bg_color',
        'text_color'
    ];
}
