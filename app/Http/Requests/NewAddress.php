<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewAddress extends FormRequest
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
            'title' => 'required',
            'name' => 'required',
            'province_id' => 'required',
            'city_id' => 'required',
            // 'district_id' => 'required',
            'content' => 'required',
            // 'zipcode' => 'required|numeric|digits:10',
            'mobile' => 'required|numeric|digits:10',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'عنوانی را برای آدرس خود در نظر بگیرید.',
            'name.required' => 'نام شخص تحویل گیرنده را مشخص نمایید.',
            'province_id.required' => 'استان خود را انتخاب نمایید.',
            'city_id.required' => 'شهر خود را انتخاب نمایید.',
            'content.required' => 'جزئیات آدرس پستی را وارد نمایید.',
            // 'zipcode.required' => 'کدپستی را وارد نمایید.',
            // 'zipcode.numeric' => 'کد پستی را به عدد وارد نمایید.',
            // 'zipcode.digits' => 'کدپستی عددی 10 رقمی است.',
            'mobile.required' => 'تلفن همراه را وارد نمایید.',
            'mobile.numeric' => 'تلفن همراه را به عدد وارد نمایید.',
            'mobile.digits' => 'فرمت ورودی تلفن همراه صحیح نیست. (مثال:09121234567)',
        ];
    }

}
