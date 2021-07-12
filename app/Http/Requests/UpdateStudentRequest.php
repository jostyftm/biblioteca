<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStudentRequest extends FormRequest
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
            'code'          =>  "required|unique:students,code,{$this->student->id}",
            'name'          =>  'required',
            'last_name'     =>  'required',
            'age'           =>  'required',
            'email'         =>  "required|email|unique:users,email,{$this->student->user->id}",
        ];
    }

    /**
     * 
     * @return array
     */
    public function messages()
    {
        return [
            'code.required'         =>  'El codigo es requerido',
            'code.unique'           =>  'El codigo ya esta registrado',
            'name.required'         =>  'El nombre es requerido',
            'last_name.required'    =>  'El apellido es requerido',
            'age.required'          =>  'La edad es requerida',
            'email.required'        =>  'El correo electrónico es requerido',
            'email.unique'          =>  'El correo electrónico ya esta registrado',
            'email.email'           =>  'Introduzca una dirección de correo valida'
        ];
    }
}
