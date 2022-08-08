<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsletterValidate extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'email' => 'required|email|unique:newsletters,email'
        ];
    }
    public function messages()
    {
        return [
            'email.required' => 'لطفا یک ایمیل وارد کنید',
            'email.email' => 'لطفا یک ایمیل معتبر وارد کنید',
            'email.unique' => 'شما با این ایمیل قبلا عضو شده بودید.'
        ];
    }
}
