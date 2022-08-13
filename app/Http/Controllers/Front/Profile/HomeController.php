<?php

namespace App\Http\Controllers\Front\Profile;

use App\Http\Controllers\Controller;
use App\Models\Product;
use CyrildeWit\EloquentViewable\Support\Period;
use Illuminate\Http\Request;
use Auth;
use Redirect;
use File;

class HomeController extends Controller
{
    public function __construct(){$this->middleware('auth');}

	public function main()
	{
        $data['most_view'] = Product::published()->orderByUniqueViews('desc', Period::pastDays(1))->limit(4)->get();

        return view('profile.home.main',compact('data'));
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
