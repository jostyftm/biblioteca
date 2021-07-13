<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateBookRequest extends FormRequest
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
            'code'          =>  'required|unique:books',
            'title'         =>  'required|unique:books',
            'editorial'     =>  'required',
            'copies'        =>  'required|integer'
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
            'title.required'        =>  'El titulo es requerido',
            'title.unique'          =>  'El titulo ya esta registrado',
            'editorial.required'    =>  'La editorial es requerido',
            'copies.required'       =>  'El número de copias es requerido',
            'copies.integer'        =>  'La cantidad de copias debe ser un número',
        ];
    }
}
