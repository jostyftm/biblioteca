<?php

namespace App\Rules;

use App\Models\Book;
use Illuminate\Contracts\Validation\Rule;

class ExistingBookRule implements Rule
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

        return !is_null($book);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'El codigo del libro no existe.';
    }
}
