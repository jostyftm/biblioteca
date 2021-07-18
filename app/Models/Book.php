<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'title',
        'editorial',
        'copies',
        'description'
    ];

    public function reservations(): HasMany
    {
        return $this->hasMany(Reservation::class, 'book_id');
    }

    public static function searchBooks($search)
    {
        return self::orderBy('id', 'desc')
        ->where('code', 'like', "%{$search}%")
        ->orWhere('title', 'like', "%{$search}%")
        ->orWhere('editorial', 'like', "%{$search}%")
        ->paginate(5);
    }
}
