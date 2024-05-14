<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BillRequest extends FormRequest
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
            //
            'customer_name' => 'required',
            'customer_phone' => 'bail|required|digits_between:10,12',
            'customer_email' => 'bail|required|email',
            'customer_address' => 'required',
            'bill_status' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'customer_name.required' => 'Tên khách hàng không được để trống',
            'customer_phone.required' => 'Số điện thoại khách hàng không được để trống',
            'customer_phone.digits_between' => 'Số điện thoại phải từ 10 đến 12 số',
            'customer_email.email' => 'Email không đúng định dạng',
            'customer_email.required' => 'Email khách hàng không được để trống',
            'customer_address.required' => 'Địa chỉ khách hàng không được để trống',
        ];
    }
}
