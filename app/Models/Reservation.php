<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'reservation_state',
        'reservated_at'
    ];

    /**
     * 
     */
    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class, 'student_id');
    }

    /**
     * 
     */
    public function books(): BelongsToMany
    {
        return $this->belongsToMany(Book::class, 'reservation_items')
        ->using(ReservationItem::class);
    }
}
