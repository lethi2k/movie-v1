<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            "category_description.name" => 'required|min:2|max:255|unique:oc_category_description,name,'.$this->id. ',category_id',
        ];
    }

    public function messages()
    {
        return [
            'unique' => 'Tên đã tồn tại',
        ];
    }
}
