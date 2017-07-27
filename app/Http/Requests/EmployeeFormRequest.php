<?php

namespace SIAM\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeFormRequest extends FormRequest
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
            'name'          => 'required|max:25',
            'apellidos'     => 'required|max:50',
            'telefono'      => 'required|max:10',
            'direccion'     => 'required',
            'tipo_usuario'  => 'required',
            'fecha_nac'     => 'required',
            'sexo'          => 'required',
            'email'         => 'required|email|max:255|unique:users',
            'password'      => 'required|min:2|confirmed',

            'fecha_nac'     => 'required',
            'fotohash'      => 'mimes:jpeg,jpg,bmp,png',
            
            'especialidad'  => '',
            'cedula'        => '',
        ];
    }
}
