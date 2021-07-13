<?php

namespace App\Http\Requests;

use App\Rules\ExistingBookRule;
use App\Rules\ExistingStudentRule;
use App\Rules\StockBookRule;
use App\Rules\StudentHasReservationPendingRule;
use Illuminate\Foundation\Http\FormRequest;

class CreateReservationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'student_code'  =>  [
                'required', 
                new ExistingStudentRule(),
                new StudentHasReservationPendingRule(),
            ],
            'book_code'  =>  [
                'required',
                new ExistingBookRule(),
                new StockBookRule(),
            ]
        ];
    }

    /**
     * 
     * @return array
     */
    public function messages()
    {
        return [
            'student_code.required' =>  'El codigo del estudiante es requerido',
            'book_code.required'    =>  'El codigo del libro es requerido'
        ];
    }
}
