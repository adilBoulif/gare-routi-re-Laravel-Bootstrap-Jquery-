<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class validationSociete extends FormRequest
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
            //
            'nom'=>'required',
            'email'=>'required',
            'tel'=>'required'
           //'adresse'=>'required',
           // 'image'=>'required'
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
