<?php

namespace App\Rules;

use App\Models\Reservation;
use App\Models\Student;
use Illuminate\Contracts\Validation\Rule;

class StudentHasReservationPendingRule implements Rule
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

        if(is_null($student)) return false;

        $reservationPendings = $student->reservations()
                                ->where('reservation_state_id', '=', 1)
                                ->count();

        return $reservationPendings == 0;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'El estudiante ya cuenta con un prestamo pendiente.';
    }
}
