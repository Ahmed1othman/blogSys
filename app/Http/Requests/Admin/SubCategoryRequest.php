<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class SubCategoryRequest extends FormRequest
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
            'subcategory_en'=>'string|required|max:250|unique:sub_categories,subcategory_en,'.$this->id,
            'subcategory_ar'=>'string|required|max:250|unique:sub_categories,subcategory_ar,'.$this->id,
        ];
    }
}
