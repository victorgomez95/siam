<?php

namespace SIAM\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserEditRequest extends FormRequest
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
            'name'          => 'required|max:255',
            'apellidos'     => 'required|max:255',
            'telefono'      => 'required|max:10',
            'direccion'     => 'required|max:255',
            'sexo'          => 'required|max:10',
            'fotohash'      => '',
            'fecha_nac'     => 'required',
        ];
    }
}
