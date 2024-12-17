<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VariantRequest extends FormRequest
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
            "option_description.name" => 'required|min:2|max:255|unique:oc_option_description,name,'.$this->id. ',option_id',
        ];
    }

    public function messages()
    {
        return [
            'unique' => 'Tên đã tồn tại',
        ];
    }
}
