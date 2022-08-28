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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'pro_name' => 'required|unique:products,pro_name,' . $this->id . ',pro_id',
            'pro_price' => 'required|numeric',
            'pro_quantity' => 'required|numeric',
            'pro_category_id' => 'required',
            'pro_brand_id' => 'required',
            'pro_avatar' => 'image',
        ];
    }
    public function messages()
    {
        return [
            'pro_name.required' => 'Tên sản phẩm không được để trống',
            'pro_name.unique' => 'Tên sản phẩm đã tồn tại',
            'pro_price.required' => 'Giá sản phẩm không được để trống',
            'pro_price.numeric' => 'Giá sản phẩm phải là số',
            'pro_quantity.required' => 'Số lượng sản phẩm không được để trống',
            'pro_quantity.numeric' => 'Số lượng sản phẩm phải là số',
            'pro_category_id.required' => 'Danh mục sản phẩm không được để trống',
            'pro_brand_id.required' => 'Thương hiệu sản phẩm không được để trống',
            'pro_avatar.required' => 'Ảnh sản phẩm không được để trống ',
            'pro_avatar.image' => 'Ảnh sản phẩm phải là định dạng ảnh',
        ];
    }
}