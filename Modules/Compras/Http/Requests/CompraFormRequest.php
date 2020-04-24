<?php

namespace Modules\Compras\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompraFormRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'tipo_comprobante'=>'required',
            'serie_comprobante'=>'required',
            'numero_comprobante'=>'required',
            'fecha_compra'=>'required',
            'proveedor_id'=>'required',

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
            'tipo_comprobante.required'=>'ingrese el tipo de comprobante',
            'serie_comprobante.required'=>'ingrese la serie del comprobante',
            'numero_comprobante.required'=>'ingrese el número del comprobante',
            'fecha_compra.required'=>'ingrese la fecha de la compra',
            'proveedor_id.required'=>'ingrese el proveedor de la compra',
        ];
    }
}
