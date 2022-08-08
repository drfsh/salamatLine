<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SurveyRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'quality' => 'required|in:1,2,3,4,5',
            'price' => 'required|in:1,2,3,4,5',
            'transport' => 'required|in:1,2,3,4,5',
            'overall' => 'required|in:1,2,3,4,5',
            'levels' => 'required|in:0,1',
            'acquaint' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'quality.required' => 'این فیلد اجباریست',
            'price.required' => 'این فیلد اجباریست',
            'transport.required' => 'این فیلد اجباریست',
            'overall.required' => 'این فیلد اجباریست',
            'levels.required' => 'این فیلد اجباریست',
            'acquaint.required' => 'این فیلد اجباریست',
            'quality.in' => 'یک گزینه را انتخاب کنید',
            'priec.in' => 'یک گزینه را انتخاب کنید',
            'transport.in' => 'یک گزینه را انتخاب کنید',
            'overall.in' => 'یک گزینه را انتخاب کنید',
            'levels.in' => 'یک گزینه را انتخاب کنید'
        ];
    }
}
