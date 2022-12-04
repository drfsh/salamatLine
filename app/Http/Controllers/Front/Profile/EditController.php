<?php

namespace App\Http\Controllers\Front\Profile;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Entry;
use App\Traits\Smstrait;
use App\Traits\UnicodeNumber;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateProfile;
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;
use Session;

class EditController extends Controller
{
    use UnicodeNumber;
    use Smstrait;

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


    public function sendCodeVerify(Request $request)
    {
        $data = ['true' => true];


        $phone = $this->convert2english($request->mobile);
        $number = rand(1000, 9999);
        $current = Carbon::now();


        if (!$phone) {
            return response()->json(['EnterPhone' => true, 'color' => 'warning', 'alert' => 'شماره موبایل را وارد کنید.', 'show_name' => false]);
        }
        if (strlen($phone) != 11 && strlen($phone) != 10) {
            return response()->json(['EnterPhone' => true, 'color' => 'warning', 'alert' => 'شماره موبایل عددی یازده یا ده رقمی است.', 'show_name' => false]);
        }

        if (!is_numeric($phone)) {
            return response()->json(['EnterPhone' => true, 'color' => 'warning', 'alert' => 'شماره موبایل را با فرمت صحیح وارد نمایید.', 'show_name' => false]);
        }

        $entry = Entry::where('user_id', auth()->id())->first();

        if (!$entry) {
            $entry = Entry::create([
                'user_id' => auth()->id(),
                'code' => $number,
                'expire' => $current->addMinute(2),
            ]);
        } else {
            $entry->code = $number;
            $entry->expire = $current->addMinute(2);
            $entry->save();
        }

        $this->Sendsms($phone, 'AuthUser', $number, $number, null, auth()->user()->name);

        return response()->json(['EnterPhone' => false]);
    }
    public function verifyUser(Request $request)
    {
        $id = $request->code;
        $code = $this->convert2english($id);
        $phone = $this->convert2english($request->mobile);

        if ($code == null) {
            return response()->json(['color' => 'warning', 'alert' => 'کد رو وارد کن']);
        }

        $entry = Entry::where('code', $code)->first();

        if (!$entry) {
            return response()->json(['color' => 'warning', 'alert' => 'کد اشتباه است.']);
        }

        $now = Carbon::now();
        $active = Carbon::parse($entry->expire);
        if ($now > $active) {
            return response()->json(['color' => 'warning', 'alert' => 'زمان ورود به پایان رسیده، لطفا دوباره تلاش کن.']);
        }

        $entry->delete();
        auth()->user()->mobile = $phone;
        auth()->user()->save();

        return response()->json(['color' => 'success', 'alert' => 'در حال انتقال به صفحه اصلی!']);
    }

}
