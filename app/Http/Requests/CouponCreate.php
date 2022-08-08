<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CouponCreate extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'code' => 'required|unique:coupons,code|min:2',
        ];
    }
    public function messages()
    {
        return [
            'code.required' => 'عنوان را وارد نمایید.',
            'code.unique' => 'این عنوان قبلا وارد شده است.',
            'code.min' => 'حداقل 2 کاراکتر!',
        ];
    }
}
