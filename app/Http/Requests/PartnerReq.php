<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PartnerReq extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'fullname' => 'required|min:5',
            'company' => 'required|min:5',
            'mobile' => 'required|numeric|digits:11',
            'address' => 'required|min:5',
            'staff' => 'required|numeric',
            'product' => 'required|numeric',
            'sale' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'fullname.required' => 'نام خود را کامل وارد نمایید.',
            'fullname.min' => 'حداقل 5 کاراکتر!',
            'company.required' => 'نام شرکت یا برند را وارد نمایید.',
            'company.min' => 'حداقل 5 کاراکتر!',
            'mobile.required' => 'تلفن همراه را وارد نمایید.',
            'mobile.numeric' => 'تلفن همراه را به عدد وارد نمایید.',
            'mobile.digits' => 'فرمت ورودی تلفن همراه صحیح نیست. (مثال:09121234567)',
            'address.required' => 'آدرس را وارد نمایید.',
            'address.min' => 'حداقل 5 کاراکتر!',
            'staff.required' => 'تعداد را وارد نمایید.',
            'staff.numeric' => 'به عدد وارد نمایید.',
            'product.required' => 'تعداد را وارد نمایید.',
            'product.numeric' => 'به عدد وارد نمایید.',
            'sale.required' => 'یک گزینه را انتخاب کنید.',
        ];
    }
}
