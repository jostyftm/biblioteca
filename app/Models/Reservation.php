<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'book_id',
        'reservation_state_id',
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
    public function book(): BelongsTo
    {
        return $this->belongsTo(Book::class, 'book_id');
    }

    /**
     * 
     */
    public function state(): BelongsTo
    {
        return $this->belongsTo(ReservationState::class, 'reservation_state_id');
    }

    /**
     * 
     */
    public function scopeByState($query, $state_id)
    {
        if($state_id)
            return $query->where('reservation_state_id', '=', $state_id);
    }
}
