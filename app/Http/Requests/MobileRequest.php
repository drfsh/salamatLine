<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MobileRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|min:2|max:64',
            'lname' => 'max:64',
            'mobile' => 'required|unique:users|numeric|digits:11'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'نام را وارد نمایید.',
            'name.max' => 'حداکثر 64 کاراکتر!',
            'name.min' => 'حداقل 2 کاراکتر!',
            'lname.max' => 'حداکثر 64 کاراکتر!',
            'mobile.required' => 'شماره موبايل را وارد نمایید.',
            'mobile.numeric' => 'شماره را با اعداد انگلیسی وارد کن.',
            'mobile.digits' => 'ظاهرا یه جایی از شماره رو اشتباه زدی!',
            'mobile.unique' => 'این شماره قبلا وارد شده است.',
        ];
    }
}
