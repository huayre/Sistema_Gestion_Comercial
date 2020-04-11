<?php

namespace Modules\Compras\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProveedorFormRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'tipo_documento'=>'required',
            'numero_documento'=>'required',
            'nombre_empresa'=>'required',
            'ubicacion_departamento'=>'required',
            'ubicacion_provincia'=>'required',
            'ubicacion_distrito'=>'required'
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

    public function messages()
{
    return [
        'tipo_documento.required'=>'Seleccione un tipo de documento',        
        'numero_documento.required'=>'Ingrese el número de documento del proveedor',
        'nombre_empresa.required'=>'Ingrese el nombre del proveedor o la empresa',
        'ubicacion_departamento.required'=>'Seleccione un departamento',
        'ubicacion_provincia.required'=>'Seleccione una provincia',
        'ubicacion_distrito.required'=>'Seleccione un distrito'
    ];
}
}
