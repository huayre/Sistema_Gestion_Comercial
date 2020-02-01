<?php

namespace Modules\Almacen\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MarcaFormRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nombre'=>'required|unique:marcas,nombre'
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
        return [
            'nombre.required'=>'El campo nombre es obligatorio',
            'nombre.unique'=>'La marca ya existe..!!'
        ];
    }
}
