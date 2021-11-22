<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'details_en'=>'string|required',
            'details_ar'=>'string|required',
            'tags_en'=>'string|required|max:250',
            'tags_ar'=>'string|required|max:250',
            //'image'=>'required_without:old_image|image|mimes:jpeg,png,jpg,gif,svg',

        ];
    }
}
