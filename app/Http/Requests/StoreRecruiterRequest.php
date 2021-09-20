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
            'belong_enterprise'     =>'required',
            'enterprise_id'         =>'nullable',
            'avatar'                =>  'file',
            'city_id'               =>'required',
            'status'                =>'required',
        ];
    }

    protected function prepareForValidation()
    {
        ($this->has('belong_enterprise')) ? ($belong_enterprise = 1) : ($belong_enterprise = 0);
        if ($this->enterprise_id == "0")  ($enterprise_id = null);
        ($this->enterprise_id == "0") ? ($status = 1) :  ($status = 0);

        $this->merge([
            'belong_enterprise'     => intval($belong_enterprise),
            'enterprise_id'         => $enterprise_id,
            'status'                => intval($status),
        ]);
    }
}
