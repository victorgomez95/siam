<?php

namespace SIAM\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyFormRequest extends FormRequest
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
            'nombre'            => 'required|max:50',
            'anio_fundacion'    => 'required|max:5',
            'encargado'         => 'required|max:45',
            'ubicacion'         => 'required',
            'telefono'          => 'required|max:10',
            'mision'            => 'required',
            'vision'            => 'required',
            'email'             => 'required',
            'fotohash'          => ''
        ];
    }
}
