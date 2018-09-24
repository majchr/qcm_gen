<?php

namespace App\Http\Requests;

use Carbon\Carbon;


use Illuminate\Foundation\Http\FormRequest;

class fixRequest extends FormRequest
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
            'date_debut' => 'required|after:current_date',
            'date_fin' => 'required|after:date_debut',
        ];
    }
}
