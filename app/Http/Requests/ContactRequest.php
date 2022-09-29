<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'email' => 'required|email',
            'title' => 'required',
            'body' => 'required',
            'name' => 'required',
            'mobile' => 'required|numeric|digits:11',

        ];
    }


    public function messages()
    {
        return [
            'title.required' => 'موضوع را وارد کنید.',
            'body.required' => 'متن را وارد کنید.',
            'name.required' => 'نام خود را وادر کنید.',
            'mobile.required' => 'تلفن همراه را وارد نمایید.',
            'mobile.numeric' => 'تلفن همراه را به عدد وارد نمایید.',
            'mobile.digits' => 'فرمت ورودی تلفن همراه صحیح نیست. (مثال:09121234567)',
            'email.required' => 'لطفا یک ایمیل وارد کنید',
            'email.email' => 'لطفا یک ایمیل معتبر وارد کنید',
        ];
    }
}
