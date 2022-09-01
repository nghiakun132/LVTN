<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SupplierRequest extends FormRequest
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
            's_name' => 'required',
            's_address' => 'required',
            's_phone' => 'required',
            's_email' => 'required',
        ];
    }
    public function messages()
    {
        return [
            's_name.required' => 'Vui lòng nhập tên nhà cung cấp',
            's_address.required' => 'Vui lòng nhập địa chỉ nhà cung cấp',
            's_phone.required' => 'Vui lòng nhập số điện thoại nhà cung cấp',
            's_email.required' => 'Vui lòng nhập email nhà cung cấp',
        ];
    }
}