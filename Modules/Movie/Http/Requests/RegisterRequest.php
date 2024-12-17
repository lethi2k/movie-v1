<?php

namespace Modules\Movie\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            "email" => 'email|required|unique:oc_customer,email',
            "username" => 'required|min:2|max:255',
            "password" => 'required|min:2|max:255|confirmed',
            "password_confirmation" => 'required',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Bạn chưa điền thông tin trong trường :attribute',
            'max' => 'vượt quá kí tự tối đa trong trường :attribute',
            'min' => 'Nội dung quá ngắn ở trường :attribute',
            'unique' => 'attribute: đã tồn tại',
            'confirmed' => 'attribute: không giống nhau',
        ];
    }
}
