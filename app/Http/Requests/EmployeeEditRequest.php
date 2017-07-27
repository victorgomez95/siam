<?php

namespace SIAM\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeEditRequest extends FormRequest
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
            'nombre'        => 'required|max:25',
            'apellidos'     => 'required|max:50',
            'telefono'      => 'required|max:10',
            'direccion'     => 'required',
            'tipo_usuario'  => 'required',
            'fecha_nac'     => 'required',
            'especialidad'  => '',
            'sexo'          => 'required',
            'fotohash'      => 'mimes:jpeg,jpg,bmp,png',
            'cedula'        => ''
        ];
    }
}
