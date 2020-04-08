<?php

namespace Modules\Almacen\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MedidaFormRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nombre'=>'required|unique:medidas,nombre'
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    public function messages(){
        return[
            'nombre.required'=>'Ingrese el nombre de la unidad de medida',
            'nombre.unique'=>'La unidad de medida ya existe..!!'
        ];
    }
}
