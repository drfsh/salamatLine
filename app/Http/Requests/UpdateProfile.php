<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\User;

class UpdateProfile extends FormRequest
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
        $user = User::where('id', $this->id)->first();
        return [
            'name' => ['required', 'min:3','max:64'],
            'lname' => ['nullable', 'min:3', 'max:64'],
            'email' => ['required', 'min:3', 'max:128','email:rfc', Rule::unique('users')->ignore($user->id)],
            'mobile' => ['nullable', 'numeric', 'digits:11', Rule::unique('users')->ignore($user->id)],
            'phone' => ['nullable', 'numeric', Rule::unique('users')->ignore($user->id)]
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'ورود نام اجباری است',
            'name.min' => 'حداقل سه حرف وارد کنید.',
            'name.max' => 'حداکقر تعداد مجاز 64 کارکتر است.',
            'lname.min' => 'حداقل سه حرف وارد کنید.',
            'lname.max' => 'حداکقر تعداد مجاز 64 کارکتر است.',
            'email.required' => 'ورود ایمیل اجباری است',
            'email.min' => 'حداقل 3 حرف وارد نمایید.',
            'email.max' => 'حداکثر تعداد کاراکتر 128 عدد است.',
            'email.email' => 'فرمت ایمیل صحیح نیست',
            'mobile.numeric' => 'فرمت استاندارد را رعایت کنید',
            'mobile.digits' => 'فرمت استاندارد را رعایت کنید',
            'mobile.unique' => 'این شماره قبلا ثبت شده است.',
            'phone.numeric' => 'فرمت استاندارد را رعایت کنید',
            'phone.unique' => 'این شماره قبلا ثبت شده است.',
        ];
    }


}
