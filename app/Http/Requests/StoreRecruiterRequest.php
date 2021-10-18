<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRecruiterRequest extends FormRequest
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
            'phone'                 =>'required',
            'street_name'           =>'required',
            'street_number'         =>'required',
            'belong_enterprise'     =>'required',
            'enterprise_id'         =>'required',
            'avatar'                => 'file',
            'city_id'               =>'required',
            'status'                =>'required',
        ];
    }

    protected function prepareForValidation()
    {

        ($this->has('belong_enterprise')) ? ($belong_enterprise = 1) : ($belong_enterprise = 0);

        $this->merge([
            'belong_enterprise'     => $belong_enterprise,
            'status'                => 0,
        ]);
    }
}
