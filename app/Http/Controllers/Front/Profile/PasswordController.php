<?php

namespace App\Http\Controllers\Front\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\User;
use Hash;
Use Redirect;

class PasswordController extends Controller
{
	public function __construct(){$this->middleware('auth');}
	public function main()
	{
		return view('profile.password.main');
	}

	public function update(Request $request)
	{
			$user = Auth::user();
			$OldPassword = $request->old_password;
			$NewPassword = $request->new_password;
			$repeat_password = $request->repeat_password;

			if (strlen($NewPassword) < 8) {
				return redirect()->route('ChangePassword')->withErrors(['رمز عبور حداقل باید 8 کاراکتر داشته باشد.']);
			}
			if(!Hash::check($OldPassword, $user->password) && $user->password){
				return redirect()->route('ChangePassword')->withErrors(['رمز قبلی را درست وارد نکرده‌اید.']);
			}

			if ($OldPassword == $NewPassword) {
				return redirect()->route('ChangePassword')->withErrors(['رمز جدید و قدیم نمیتواند یکسان باشد.']);
			}

			if ($NewPassword != $repeat_password) {
				return redirect()->route('ChangePassword')->withErrors(['رمز عبور جدید با تکرار رمز وارد شده برابر نیست.']);
			}
						
			$user->password = Hash::make($NewPassword);
			$user->save();
			return redirect()->route('ChangePassword')->withErrors(['رمز عبور شما با موفقیت تغییر کرد.']);

		
	}
}
