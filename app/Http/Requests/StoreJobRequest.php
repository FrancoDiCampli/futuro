<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use App\Models\Vacancy;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoreJobRequest extends FormRequest
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
            'title'         => 'required|max:255',
            'description'   => 'required',
            'looking_for'   => 'required',
            'hiring'        => 'required',
            'available'     => 'required',
            'country'       => 'required',
            'schedule'      => 'required',
            'paid'          => 'required',
            'skills.*'      =>  ['required', Rule::in(Vacancy::SKILLS)],
            'enterprise'    => 'required|min:1',
            'visible'       => 'required|min:1',
            'expired_at'    => 'required',
            'city_id'       => 'required|exists:cities,id',
            'subcategory_id'=> 'required|exists:subcategories,id',

        ];
    }

    protected function prepareForValidation()
    {
        ($this->has('enterprise')) ? ($enterprise = 1) : ($enterprise = 0);
        ($this->has('visible')) ? ($visible = 1) : ($visible = 0);
        $this->merge([
            'enterprise'    => $enterprise,
            'visible'       => $visible,
            'expired_at'    => Carbon::today()->addDays(30)
        ]);
    }
}
