<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Coupon;
use Auth;
use Cart;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Log;


class CouponController extends Controller
{
    public function addCoupon(Request $request)
    {
    	$name = $request->name;
    	$now = Carbon::now();

        if (!Auth::check()) {
            $userId = Cookie::get("guest_id");
        } else
            $userId = Auth::id();

        $coupon = Coupon::where('code' , '=', $name)->first();
        $usedcoupon = Cart::session($userId)->getCondition('coupon');

        if (!$usedcoupon) {
            
            if($request->name) {

                if (!$coupon) {
                    return response()->json(['success' => 'تخفیفی با این عنوان وجود ندارد.']);
                }

                if(!$coupon->active){
                    return response()->json(['success' => 'این تخفیف فعال نیست.']);
                }
                
                if ($now <= $coupon->starts_at || $now >= $coupon->expires_at) {
                    // Log::info(1);
                    return response()->json(['success' => 'امکان استفاده از این کد تخفیف هم اکنون وجود ندارد.']);
                }
                // if($coupon->is_fixed = 0){
                //     if($coupon->max_uses = 0 || $coupon->uses >= $coupon->max_uses){
                //         return response()->json(['success' => 'متاسفانه حداکثر تعداد مجاز از این کد به پایان رسیده.']);
                //     }
                // }

                if(Cart::session($userId)->getSubTotal() <= $coupon->min_order){
                    return response()->json(['success' => 'حداقل میزان خرید رعایت نشده است، حداقل میزان خرید '. $coupon->min_order .'  ریال']);
                }

                if ($coupon->is_fixed = 1 || $coupon->max_uses > $coupon->uses){
                    if ($now >= $coupon->starts_at and $coupon->expires_at >= $now) {
                        if ($coupon->discount_percent) {
                            $condition = new \Darryldecode\Cart\CartCondition(array(
                                'name' => 'coupon',
                                'type' => 'discount',
                                'target' => 'subtotal',
                                'value' => -$coupon->discount_percent.'%',
                                'attributes' => array(
                                    'name' => $coupon->name,
                                    'code' => $coupon->code,
                                    'id' => $coupon->id,
                                    'method' => 'percent'
                                )
                            ));
                            Cart::session($userId)->condition($condition);
                            return response()->json(['success' => 'کد تخفیف شما با موفقیت اعمال گردید.']);
                        }
                        if(Cart::session($userId)->getSubTotal() > $coupon->min_order && $coupon->price){
                            $condition = new \Darryldecode\Cart\CartCondition(array(
                                'name' => 'coupon',
                                'type' => 'discount',
                                'target' => 'subtotal',
                                'value' => -$coupon->price,
                                'attributes' => array(
                                    'name' => $coupon->name,
                                    'code' => $coupon->code,
                                    'id' => $coupon->id,
                                    'method' => 'price'
                                )
                            ));
                            Cart::session($userId)->condition($condition);
                            return response()->json(['success' => 'کد تخفیف شما با موفقیت اعمال گردید.']);
                        }
                    }
                }

                // return response()->json(['success' => 'done']);

            }else{
                return response()->json(['success' => 'یک کد تخفیف وارد کنید.']);
            }
        }
    }

    public function getCondition(){

        $data['discondition'] = Cart::session($userId)->getConditions()->count();
        return $data;
    }

    public function DeleteCoupon(){
        $userId = Auth::id();
        Cart::session($userId)->removeCartCondition('coupon');
        // Cart::session($userId)->clearCartConditions();
        return response()->json(['success' => 'کد تخفیف حذف شد.']);
    }
}
