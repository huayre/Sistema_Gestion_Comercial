<?php

namespace Modules\Ventas\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClienteFormRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [        
            'nombres'=>'required',
            'tipo_documento'=>'required',
            'numero_documento'=>'required'
            
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
            'nombres.required'=>'El nombre del cliente es obligatorio',
            'tipo_documento.required'=>'Selecciona un tipo de documento',
            'numero_documento.required'=>'El número documento es obligatorio'
            
        ];
        
    }
}
