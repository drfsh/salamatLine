<?php

namespace App\Http\Controllers\Front\Profile;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateProfile;
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;
use Session;

class EditController extends Controller
{
	public function __construct(){$this->middleware('auth');
        View::share('categories',Category::defaultOrder()->toTree()->get());
    }
	public function main()
	{
		$user = Auth::user();
        if ($user->full_name==null){
            $user->full_name = $user->name.' '.$user->lname;
        }
        if ($user->nama_name==null){
            $user->nama_name = $user->full_name;
        }
		return view('profile.edit.main',compact('user'));
	}

	public function update($id,UpdateProfile $request)
	{
		$user = Auth::user();

		if ($id != $user->id) {
			return 'error';
		}


        $user->full_name = $request->full_name;
		$user->nama_name = $request->nama_name;
		$user->email = $request->email;
//		$user->phone = $request->phone;
		$user->mobile = $request->mobile;
		$user->code_m = $request->code_m;

        if (!is_null($request->password1)){
            if ($request->password1!=$request->password2){
                Session::flash('passwordE', 'تایید تکرار پسورد اشتباه است!');
                return redirect()->route('ProfileEdit');
            }
            $user->password = Hash::make($request->password1);
            Session::flash('passwordT', 'پسورد با موفقیت ثبت شد!');
        }

		$user->save();
        Session::flash('success', 'اطلاعات شما با موفقیت به‌روز گردید.');
        return redirect()->route('ProfileEdit');
	}

}
