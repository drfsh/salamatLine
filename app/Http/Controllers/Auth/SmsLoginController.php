<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Log;
use App\Traits\ImportCart;
use Illuminate\Http\Request;
use App\Http\Requests\PhoneValidate;
use App\Http\Requests\LoginCodeValidate;
use App\Models\User;
use App\Models\Entry;
use Carbon\Carbon;
use Auth;
use App\Traits\Smstrait;
use App\Traits\UnicodeNumber;

// use Log;


class SmsLoginController extends Controller
{
    use Smstrait;
    use UnicodeNumber;
    use ImportCart;

    public function findOrCreateUser($phone)
    {
        $authUser = User::where('mobile', $phone)->first();
        if ($authUser) {
            return $authUser;
        }
        return User::firstOrCreate([
            'mobile' => $phone,
        ]);
    }


    public function main(Request $request)
    {


        $phone = $this->convert2english($request->mobile);
        $name = $request->name;
        $lname = $request->lname;
        $number = rand(1000, 9999);
        $current = Carbon::now();

        $user = User::where('mobile', $phone)->first();

        if (!$phone) {
            return response()->json(['EnterPhone' => true, 'color' => 'warning', 'alert' => 'شماره موبایل را وارد کنید.', 'show_name' => false]);
        }
        if (strlen($phone) != 11 && strlen($phone) != 10) {
            return response()->json(['EnterPhone' => true, 'color' => 'warning', 'alert' => 'شماره موبایل عددی یازده یا ده رقمی است.', 'show_name' => false]);
        }

        if (!is_numeric($phone)) {
            return response()->json(['EnterPhone' => true, 'color' => 'warning', 'alert' => 'شماره موبایل را با فرمت صحیح وارد نمایید.', 'show_name' => false]);
        }

        if (!$user) {
            if ($name == null) {
                return response()->json([
                    'EnterPhone' => true,
                    'color' => 'warning',
                    'show_name' => true,
                    'alert' => 'لطفا نام خود را وارد نمایید.'
                ]);
            }
        }

        // Log::info($number);

        $authUser = $this->findOrCreateUser($phone);

        if (!$user) {
            $authUser->name = $name;
            $authUser->lname = $lname;
            $log = Log::where([['name','users'],['for','admin']])->first();
            $log->add();
        }


        $entry = Entry::where('user_id', $authUser->id)->first();

        if (!$entry) {
            $entry = Entry::create([
                'user_id' => $authUser->id,
                'code' => $number,
                'expire' => $current->addMinute(2),
            ]);
        } else {
            $entry->code = $number;
            $entry->expire = $current->addMinute(2);
            $entry->save();
        }

        $authUser->save();

        if ($phone && $number) {
            $this->Sendsms($phone, 'AuthUser', $number, $number, null, $authUser->name);
        }
        return response()->json(['EnterPhone' => false]);
    }


    public function CheckForLogin(Request $request)
    {

        $id = $request->code;

        if (Auth::user() != null) {
            return response()->json(['color' => 'warning', 'alert' => 'قبلا وارد شدی!']);
        }

        $code = $this->convert2english($id);
        $mobile = $this->convert2english($request->mobile);
        // Log::info($code);
        if ($code == null) {
            return response()->json(['color' => 'warning', 'alert' => 'کد رو وارد کن']);
        }

        $entry = Entry::where('code', $code)->first();

        if (!$entry) {
            return response()->json(['color' => 'warning', 'alert' => 'کد اشتباه است.']);
        }


        $user = User::find($entry->user_id);


        if (!$user) {
            return response()->json(['color' => 'warning', 'alert' => 'هیچ کاربری با این مشخصات پیدا نکردیم.']);
        }


        $now = Carbon::now();
        $active = Carbon::parse($entry->expire);
        if ($now > $active) {
            return response()->json(['color' => 'warning', 'alert' => 'زمان ورود به پایان رسیده، لطفا دوباره تلاش کن.']);
        }

        Auth::login($user);
        $entry->delete();
        if (Auth::user()) {
            $this->import();
            return response()->json(['color' => 'success', 'alert' => 'در حال انتقال به صفحه اصلی!']);
        }

    }


}
