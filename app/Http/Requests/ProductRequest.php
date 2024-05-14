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
            //
            'product_name' => 'required',
            'product_price' => 'required',
            'product_discount' => 'required',
            'product_image' => 'sometimes|required_if:image, ""|image|max:2048',
            'product_color' => 'required',
            'product_description' => 'required',
            'quantities.*' => 'bail|required|integer|min:0',
            'category_id' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'product_name.required' => 'Tên sản phẩm không được để trống',
            'product_price.required' => 'Giá không được để trống',
            'product_discount.required' => 'Giá giảm không được để trống',
            'product_image.required' => 'Hình ảnh không được để trống',
            'product_color.required' => 'Màu sắc không được để trống',
            'product_description.required' => 'Mô tả không được để trống',
            'quantities.*' => [
                'required' => 'Số lượng không được để trống',
                'integer' => 'Số lượng phải là chữ số',
                'min' => 'Số lượng phải lớn hơn hoặc bằng 0'
            ],
            'category_id.required' => 'Loại sản phẩm không được để trống'
        ];
    }
}
