<?php

namespace App\Rules;

use App\Models\Student;
use Illuminate\Contracts\Validation\Rule;

class ExistingStudentRule implements Rule
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
        $student = Student::where('code', '=', $value)->first();

        return !is_null($student);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'El codigo del estudiante no existe.';
    }
}
