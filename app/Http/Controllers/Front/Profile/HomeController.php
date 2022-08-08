<?php

namespace App\Http\Controllers\Front\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Redirect;
use File;

class HomeController extends Controller
{
    public function __construct(){$this->middleware('auth');}

	public function main()
	{
		return view('profile.home.main');
	}

    public function ChangeProfilePic(Request $request){
        $user = Auth::user();
        $image = $request->file('profile');;

        $imageName = time().'.jpg';

        File::delete($user->avatar);
        \Image::make($image)->fit(400, 400)->save(public_path('img/profile/').$imageName)->orientate();
        $user->avatar = $imageName;
        $user->save();
                    
        return Redirect::back()->withErrors(['تصویر پروفایل با موفقیت آپلود شد.']);

    }


}
