<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Coupon;
use App\Http\Requests\CouponCreate;
use App\Http\Requests\CouponUpdate;
use Session;

class CouponController extends Controller
{
    public function __construct() {
        $this->middleware(['auth', 'isAdmin']);
    }

    public function index()
    {
        $coupons = Coupon::withTrashed()->orderBy('id', 'desc')->paginate(15);
        return view('admin.coupon.index', compact('coupons'));
    }

    public function create()
    {
        return view('admin.coupon.create');
    }

    public function store(CouponCreate $request)
    {
        $coupon = new Coupon;
        $coupon->title = $request->title;
        $coupon->code = $request->code;
        $coupon->content = $request->content;
        $coupon->price = $request->price;
        $coupon->discount_percent = $request->discount_percent;
        $coupon->min_order = $request->min_order;
        $coupon->max_uses = $request->max_uses;
        $coupon->starts_at = $request->starts_at;
        $coupon->expires_at = $request->expires_at;
        if ($request->is_fixed) {
            $coupon->is_fixed = 1;
        }else{
            $coupon->is_fixed = 0;
        }
        if ($request->active) {
            $coupon->active = 1;
        }else{
            $coupon->active = 0;
        }

        $coupon->save();

        return redirect()->route('coupon.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $coupon = Coupon::find($id);
        return view('admin.coupon.edit',compact('coupon'));
    }

    public function update(CouponUpdate $request, $id)
    {
        $coupon = Coupon::find($id);
        $coupon->title = $request->input('title');
        $coupon->code = $request->input('code');
        $coupon->content = $request->input('content');
        $coupon->price = $request->input('price');
        $coupon->discount_percent = $request->input('discount_percent');
        $coupon->min_order = $request->input('min_order');
        $coupon->max_uses = $request->input('max_uses');
        $coupon->starts_at = $request->input('starts_at');
        $coupon->expires_at = $request->input('expires_at');
        
        if ($request->is_fixed) {
            $coupon->is_fixed = 1;
        }else{
            $coupon->is_fixed = 0;
        }
        if ($request->active) {
            $coupon->active = 1;
        }else{
            $coupon->active = 0;
        }

        $coupon->save();
        Session::flash('success', 'کوپن ویرایش شد');
        return redirect()->route('coupon.index');
    }

    public function destroy($id)
    {
        $coupon = Coupon::find($id);
        $coupon->active = 0;
        $coupon->save();
        $coupon->delete();
        
        Session::flash('success', 'کوپن حذف شد');
        return redirect()->route('coupon.index');
    }
}
