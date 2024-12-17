<?php

namespace Modules\Customer\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Modules\Customer\Facades\Captcha;

class CustomerLoginRequest extends FormRequest
{
    /**
     * Define your rules.
     *
     * @var array
     */
    private $rules = [
        'email' => 'required|email',
        'password' => 'required',
    ];

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
            'email' => 'required|email',
            'password' => 'required',
        ];
        // return Captcha::getValidations($this->rules);
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'required' => 'Bạn chưa điền thông tin  trong trường :attribute',
            'max' => 'vượt quá kí tự tối đa  trong trường :attribute',
            'min' => 'Bạn chưa nhập tên  trong trường :attribute',
            'min' => 'Nội dung quá ngắn  trong trường :attribute',
            'numeric' => 'Định dạng không phải là số  trong trường :attribute',
            'mimes' => 'Sai đường dẫn ảnh  trong trường :attribute',
            'email' => 'Sai định dạng email  trong trường :attribute',
            'unique' => 'Tên đã tồn tại',
        ];
        // return Captcha::getValidationMessages();
    }
}
