<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginCodeValidate extends FormRequest
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
            'code' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'code.required' => 'کد رو باید وارد کنی دیگه!',
            // 'code.numeric' => 'ساختار عددی رو رعایت نکردی، عزیزم',
            // 'code.digits' => 'کد باید چهار رقمی باشه.',
        ];
    }

}
