<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\Parentcategory;

class ParentUpdate extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        
        $parent = Parentcategory::where('id', '=', $this->parent)->first();
        
        return [
            'title' => ['required', 'min:2', Rule::unique('parentcategories')->ignore($parent->id)],
            'slug' => ['required', 'min:2', 'alpha_dash', Rule::unique('parentcategories')->ignore($parent->id)]
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
