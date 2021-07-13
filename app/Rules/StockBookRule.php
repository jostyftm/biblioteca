<?php

namespace App\Rules;

use App\Models\Book;
use Illuminate\Contracts\Validation\Rule;

class StockBookRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $book = Book::where('code', '=', $value)->first();
        
        if(is_null($book)) return false;
        
        return $book->copies > 0;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'El libro no tiene unidades disponibles.';
    }
}
