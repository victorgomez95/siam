<?php

namespace SIAM\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PacientCreateRequest extends FormRequest
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
          'nombre'=>'required',
          'apaterno'=>'required',
          'amaterno'=>'required',
          'sexo'=>'required',
          'curp'=>'required',
          'nacionalidad'=>'required',
          'fecha_nac'=>'required',
          'calle'=>'required',
          'colonia'=>'required',
          'municipio'=>'required',
          'estado'=>'required',
        ];
    }
}
