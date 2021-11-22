<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class DistrictRequest extends FormRequest
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
            'district_en'=>'string|required|max:250|unique:districts,district_en,'.$this->id,
            'district_ar'=>'string|required|max:250|unique:districts,district_ar,'.$this->id,
        ];
    }
}
