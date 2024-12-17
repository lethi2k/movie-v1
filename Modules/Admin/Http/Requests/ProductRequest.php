<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            "product_description.name" => 'required|min:2|max:255|unique:oc_product_description,name,'.$this->id. ',product_id',
            "product_description.meta_title" => 'max:255',
            "product_description.meta_description" => 'max:255',
            "product_description.meta_keyword" => 'max:255',
            "product_description.custom_alt" => 'max:255',
            "product_description.custom_h1" => 'max:255',
            "product_description.custom_h2" => 'max:255',
            "product_description.custom_imgtitle" => 'max:255',
            "product_description.custom_title" => 'max:255',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Bạn chưa điền thông tin trong trường :attribute',
            'max' => 'vượt quá kí tự tối đa trong trường :attribute',
            'min' => 'Bạn chưa nhập tên trong trường :attribute',
            'min' => 'Nội dung quá ngắn trong trường :attribute',
            'numeric' => 'Định dạng không phải là số trong trường :attribute',
            'mimes' => 'Sai đường dẫn ảnh trong trường :attribute',
            'email' => 'Sai định dạng email trong trường :attribute',
            'unique' => 'Tên đã tồn tại',
        ];
    }
}
