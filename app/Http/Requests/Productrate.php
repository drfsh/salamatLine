<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Productrate extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'body' => 'required|min:5',
            'recommend' => 'required|in:Yes,No',
            'rating' => 'required|in:1,2,3,4,5' 
        ];
    }
    public function messages()
    {
        return [
            'body.required' => 'نظر خود راوارد کنید',
            'body.min' => 'حداقل 5 کاراکتر!',
            'recommend.required' => 'فیلد اجباری',
            'recommend.in' => 'یک گزینه را انتخاب کنید',
            'rating.required' => 'فیلد اجباری',
            'rating.in' => 'یک گزینه را انتخاب کنید',
        ];
    }
}
