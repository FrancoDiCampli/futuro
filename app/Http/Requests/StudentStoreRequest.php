<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentStoreRequest extends FormRequest
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
            'first_name'            =>'required',
            'last_name'             =>'required',
            'tos'                   =>'required',
            'notification'          =>'nullable',
            'title'                 =>'required',
            'experience'            =>'nullable',
            'university'            =>'nullable',
            'graduated_at'          =>'nullable',
            'average'               =>'nullable',
            'speech'                =>'nullable',
            'available'             =>'nullable',
            'preference'            =>'nullable',
            'skills'                =>'nullable',
            'courses'               =>'nullable',
            'hobbies'               =>'nullable',
            'website'               =>'nullable',
            'birthdate'             =>'required',
            'avatar'                =>'nullable',
            'subcategory_id'        =>'nullable',
            'city_id'               =>'required',
        ];
    }
    protected function prepareForValidation()
    {
        ($this->has('tos')) ? ($tos = 1) : ($tos = 0);
        ($this->has('notification')) ? ($notification = 1) : ($notification = 0);
        $this->merge([
            'tos'    => $tos,
            'notification'       => $notification,

        ]);
    }
}
