<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditarTrabajoRequest extends FormRequest
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
            'numero_factura'=>'required',
            'fecha_emision_cobro'=>'required',
            'fecha_pago'=>'required',
            'receptor_factura'=>'required',
            'orden_trabajo'=>'required',
            'orden_compra'=>'required',
            //
        ];
    }
}
