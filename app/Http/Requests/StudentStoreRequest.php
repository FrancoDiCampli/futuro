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
            'notification'          =>'required',
            'title'                 =>'required',
            'experience'            =>'required',
            'university'            =>'required',
            'graduated_at'          =>'required',
            'average'               =>'required',
            'speech'                =>'required',
            'available'             =>'required',
            'preference'            =>'required',
            'skils'                 =>'required',
            'courses'               =>'required',
            'hobbies'               =>'required',
            'website'               =>'required',
            'birthdate'             =>'required',
            'avatar'                =>'required',
            'subcategory_id'        =>'required',
            'city_id'               =>'required',
        ];
    }
}
