<?php

namespace App\Http\Controllers\Front\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateProfile;
use Auth;
use Session;

class EditController extends Controller
{
	public function __construct(){$this->middleware('auth');}
	public function main()
	{
		$user = Auth::user();
		return view('profile.edit.main',compact('user'));
	}

	public function update($id,UpdateProfile $request)
	{
		$user = Auth::user();

		if ($id != $user->id) {
			return 'error';
		}

		$user->name = $request->name;
		$user->lname = $request->lname;
		$user->email = $request->email;
		$user->phone = $request->phone;
		$user->mobile = $request->mobile;
		$user->lname = $request->lname;
		$user->save();
        Session::flash('success', 'اطلاعات شما با موفقیت به‌روز گردید.');
        return redirect()->route('ProfileEdit');
	}

}
