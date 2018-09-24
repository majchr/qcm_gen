<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class qcmRequest extends FormRequest
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
            'introduction' => 'required|min:10|max:255',
            'titre' => 'required|min:3',
            'breponse' => 'required|numeric|min:1|max:10',
            'preponse' => 'required|numeric|min:0|max:10',
            'mreponse' => 'required|numeric|max:10',
            'bareme' => 'required|numeric|min:10|max:100',
            'partagee' => 'required',



        ];
    }
}
