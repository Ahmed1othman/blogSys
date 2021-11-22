<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class SubDistrictRequest extends FormRequest
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
            'subdistrict_en'=>'string|required|max:250|unique:sub_districts,subdistrict_en,'.$this->id,
            'subdistrict_ar'=>'string|required|max:250|unique:sub_districts,subdistrict_ar,'.$this->id,
        ];
    }
}
