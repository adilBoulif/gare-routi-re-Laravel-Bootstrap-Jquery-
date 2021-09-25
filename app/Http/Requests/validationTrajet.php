<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class validationTrajet extends FormRequest
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
        'depart'=>'required',
        'destination'=>'required',
        'h_dep'=>'required',
        'h_dest'=>'required',
        'd_dep'=>'required',
        'prix'=>'required'
      
    ];
}
public function messages()
{
    return [
        //
        'required'=>'le champ :attribute est obilgatoire'
    ];
}
}
