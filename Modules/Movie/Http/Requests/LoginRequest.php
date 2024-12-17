<?php

namespace Modules\Movie\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            "email" => 'required|min:2|max:255',
            "password" => 'required|min:2|max:255',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Bạn chưa điền thông tin trong trường :attribute',
            'max' => 'vượt quá kí tự tối đa trong trường :attribute',
            'min' => 'Nội dung quá ngắn ở trường :attribute',
        ];
    }
}
