<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Log;
use Illuminate\Http\Request;
use App\Models\Newsletter;
use App\Http\Requests\NewsletterValidate;
use Auth;
use App\Models\User;

class NewsletterController extends Controller
{
    public function Subscribe(NewsletterValidate $request){

        if (Auth::check()){
            $user = User::find(Auth::id());
            $newsletter = new Newsletter;
            $newsletter->email = $request->email;
            $newsletter->user_id = $user->id;
            $newsletter->save();
            $log = Log::where([['name','emails'],['for','admin']])->first();
            $log->add();
            return response()->json(['state' => 'success','status' => 'شما عضو خبرنامه شدید']);
        }else{
            $newsletter = new Newsletter;
            $newsletter->email = $request->email;
            $newsletter->save();
            $log = Log::where([['name','emails'],['for','admin']])->first();
            $log->add();
            return response()->json(['state' => 'success','status' => 'شما عضو خبرنامه شدید']);
        }
    }

}
