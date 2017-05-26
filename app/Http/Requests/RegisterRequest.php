<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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


    public function messages()
    {
        return [
            'name.required' => 'El nombre es requerido',
            'last_name.required'  => 'El apellido es requerido',
            'email.required'  => 'El correo electrónico es requerido',
            'email.email'  => 'Ingrese un correo electrónico valido',
            'email.unique'  => 'El correo electrónico ingresado ya existe',
            'password.required'  => 'La contraseña es requerida',
            'password.min'  => 'La contraseña debe tener una longitud minima de 6',
            'confirm_password.required' => 'Debes confirmar la contraseña',
            'confirm_password.same' => 'Las contraseñas no coinciden'
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'name' => 'required',
            'last_name' => 'required',
            'email'      => 'required|email|unique:users,email',
            //'username'   => 'required|unique:users,username',
            'password'   => 'required|min:6',
            'confirm_password' => 'required|same:password'
        ];

        return $rules;
    }
}
