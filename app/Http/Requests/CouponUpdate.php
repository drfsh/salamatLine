<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\Coupon;

class CouponUpdate extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        
        $coupon = Coupon::where('id', '=', $this->coupon)->first();
        
        return [
            'code' => ['required', 'min:2', Rule::unique('coupons')->ignore($coupon->id)]
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
