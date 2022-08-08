<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BrandCreate extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'required|unique:brands,title|min:2',
            'slug' => 'required|unique:brands,slug|min:2|alpha_dash',
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'عنوان را وارد نمایید.',
            'title.unique' => 'این عنوان قبلا وارد شده است.',
            'title.min' => 'حداقل 2 کاراکتر!',
            'slug.required' => 'آدرس URL را وارد نمایید.',
            'slug.unique' => 'این آدرس قبلا وارد شده است.',
            'slug.min' => 'حداقل 2 کاراکتر!',
            'slug.alpha_dash' => 'کاراکتر فاصله را حذف کنید و از خط فاصله استفاده کنید.',
        ];
    }
}
