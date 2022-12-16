<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InquiryRequest extends FormRequest
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
            'office' => 'required',
            'name' => 'required',
            'email' => 'required|email',
            'mobile' => 'required|numeric|digits:11',
            'products' => 'required',
            'count' => 'required|numeric',
        ];
    }


    public function messages()
    {
        return [
            'office.required' => 'نام موسسه را وارد کنید.',
            'products.required' => 'نام محصول مورد نظر را وارد کنید.',
            'count.required' => 'تعداد محصول را وارد کنید.',

            'name.required' => 'نام خود را وادر کنید.',

            'email.required' => 'لطفا یک ایمیل وارد کنید',
            'email.email' => 'لطفا یک ایمیل معتبر وارد کنید',

            'mobile.required' => 'تلفن همراه را وارد نمایید.',
            'mobile.numeric' => 'تلفن همراه را به عدد وارد نمایید.',
            'mobile.digits' => 'فرمت ورودی تلفن همراه صحیح نیست. (مثال:09121234567)',

        ];
    }
}
