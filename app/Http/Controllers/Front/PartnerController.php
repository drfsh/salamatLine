<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Partner;
use Artesaos\SEOTools\Facades\SEOTools;
use App\Http\Requests\PartnerReq;
use App\Models\User;
use Auth;
use Session;
use Image;
use Storage;
use File;

class PartnerController extends Controller
{
    public function main(){
        SEOTools::setTitle('فرم اعلام همکاری تجاری');
        return view('front.partner.main');
    }

    public function PartnerRequest(PartnerReq $request){
        $user = User::find(Auth::id());

        $partner = new Partner;

        if (Auth::check()){
            $partner->user_id = $user->id;
        }
        $partner->fullname = $request->fullname;
        $partner->company = $request->company;
        $partner->email = $request->email;
        $partner->mobile = $request->mobile;
        $partner->phone = $request->phone;
        $partner->web = $request->web;
        $partner->country = $request->country;
        $partner->province = $request->province;
        $partner->city = $request->city;
        $partner->address = $request->address;
        $partner->staff = $request->staff;
        $partner->product = $request->product;
        $partner->productdesc = $request->productdesc;
        $partner->saledesc = $request->saledesc;
        $partner->sale = $request->sale;
        $partner->more = $request->more;
        $partner->acquaint = $request->acquaint;
        $partner->reason = $request->reason;
        $partner->expect = $request->expect;

        $partner->save();

        Session::flash('success', 'با تشکر، درخواست همکاری تجاری شما در اولین فرصت بررسی خواهد شد و به آن پاسخ داده می‌شود.');
        return redirect()->back();
    }
}
