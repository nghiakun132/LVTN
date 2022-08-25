<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BrandRequest extends FormRequest
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
            'b_name' => 'required',
            'b_category_id' => 'required',
            'b_name' => Rule::unique('brands', 'b_name')->where(function ($query) {
                return $query->where('b_category_id', $this->b_category_id);
            }),
        ];
    }

    public function messages()
    {
        return [
            'b_name.required' => 'Tên thương hiệu không được để trống',
            'b_category_id.required' => 'Danh mục không được để trống',
            'b_name.unique' => 'Tên thương hiệu và danh mục đã tồn tại ',
        ];
    }
}