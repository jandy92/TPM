<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewClientRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(){
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(){
        return [
            'rut'=>'required|unique:cliente,rut',
            'name'=>'required',
            'phone'=>'required',
            'giro'=>'required',
            'adress'=>'required',
        ];
    }
}