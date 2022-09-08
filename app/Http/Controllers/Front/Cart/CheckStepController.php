<?php

namespace App\Http\Controllers\Front\Cart;

use App\Http\Controllers\Controller;
use App\Models\Discount;
use Illuminate\Http\Request;
use App\Models\Address;
use App\Models\Inventory;
use App\Models\Product;
use App\Models\Multiprice;
use Auth;
use Log;
use Cart;

class CheckStepController extends Controller
{
    public function main(Request $request)
    {

        $data = [];

        $userId = Auth::id();
        $data['step'] = $request->step;
        $addressID = $request->address;
        $delivery = $request->delivery;
        // Log::info($addressID);


        if ($data['step'] == 1) {
            $qty = Cart::session($userId)->getTotalQuantity();
            if ($qty == 0) {
                $data['step'] = 1;
                $data['text'] = 'سبد خرید خالی است!';
                $data['class'] = 'alert';
                return response()->json($data);
            }

            $CartItems = Cart::session($userId)->getContent();

            foreach ($CartItems as $item) {
                $pid = $item->attributes['pid'];
                $fid = $item->attributes['fid'];
                $mid = $item->attributes['mid'];
                if ($fid == 0) {
                    $fid = null;
                }
                if ($mid == 0) {
                    $mid = null;
                }
                $reqty = $item->quantity;

                $inventory = Inventory::where('product_id', $pid)->where('feature_id', $fid)->where('price_id', $mid)->first();
                if ($inventory && $inventory->qty < $reqty) {
                    // $product = Product::where('id', $pid)->select('title')->first();
                    $data['step'] = 1;
                    $data['text'] = 'سبد خود رابروزرسانی کنید';
                    $data['class'] = 'alert';
                    $data['situation'] = 'warning';
                    $data['status'] = 'میزان موجودی محصول ' . $item->name . '، ' . $inventory->qty . ' عدد می‌باشد؛ لطفا ردیف محصول را ویرایش کنید.';
                    return response()->json($data);
                }

            }

            foreach ($CartItems as $item) {
                $pid = $item->attributes['pid'];
                $mid = $item->attributes['mid'];
                $oldprice = $item->attributes['original_price'];
                if ($mid == 0) {
                    $mid = null;
                    $product = Product::where('id', $pid)->first();
                    if ($product && $product->price > $oldprice) {
                        $data['step'] = 1;
                        $data['text'] = 'سبد خود رابروزرسانی کنید';
                        $data['class'] = 'alert';
                        $data['situation'] = 'warning';
                        $data['status'] = 'قیمت محصول ' . $product->title . ' تغییر یافته؛ لطفا از سبد خریدتان حذف کنید و دوباره به سبد خرید اضافه کنید';
                        return response()->json($data);
                    }
                } else {
                    $product = Product::where('id', $pid)->first();
                    $mulprice = Multiprice::where('id', $mid)->first();
                    if ($product && $mulprice && $mulprice->price > $oldprice) {
                        $data['step'] = 1;
                        $data['text'] = 'سبد خود رابروزرسانی کنید';
                        $data['class'] = 'alert';
                        $data['situation'] = 'warning';
                        $data['status'] = 'قیمت محصول ' . $product->title . ' - ' . $mulprice->title . ' تغییر یافته؛ لطفا از سبد خریدتان حذف کنید و دوباره به سبد خرید اضافه کنید';
                        return response()->json($data);
                    }
                }

                $discount_id = $item->attributes->discount_id;
                if (!is_null($discount_id)) {
                    $discount = Discount::find($discount_id);
                    if (!$discount->isAcrice)
                    {
                        $data['step'] = 1;
                        $data['text'] = 'سبد خود رابروزرسانی کنید';
                        $data['class'] = 'alert';
                        $data['situation'] = 'warning';
                        $data['status'] = 'زمان تخفیف محصول "' . $product->title . '" پایان یافته است؛ لطفا از سبد خریدتان حذف کنید و دوباره به سبد خرید اضافه کنید';
                        return response()->json($data);
                    }
                }
            }

            $data['step'] = 2;
            $data['text'] = 'لطفا یک آدرس را انتخاب کنید';
            $data['class'] = 'alert';

            return response()->json($data);
        }

        if ($data['step'] == 2) {


            if ($addressID!=0){

                $address = Address::find($addressID);

                if (!$address) {

                    $data['step'] = 2;
                    $data['text'] = 'آدرسی با این مشخصات یافت نشد';
                    $data['class'] = 'alert';

                    return response()->json($data);
                }

                if ($address->user_id != $userId) {
                    $data['step'] = 2;
                    $data['text'] = 'این آدرس متعلق به شما نیست';
                    $data['class'] = 'alert';

                    return response()->json($data);
                }

                $address->update([
                    'name'=>$request->address_model['name'],
                    'lname'=>$request->address_model['lname'],
                    'province_id'=>$request->address_model['province_id'],
                    'city_id'=>$request->address_model['city_id'],
                    'district_id'=>$request->address_model['district_id'],
                    'zipcode'=>$request->address_model['zipcode'],
                    'mobile'=>$request->address_model['mobile'],
                    'lat'=>$request->address_model['lat'],
                    'lng'=>$request->address_model['lng'],
                    'company'=>$request->address_model['company'],
                    'email'=>$request->address_model['email'],
                    'content'=>$request->address_model['content'],
                ]);


                $data['step'] = 3;
                $data['text'] = 'انتخاب زمان تحویل';
                $data['class'] = 'alert';
                $data['address'] = $address->id;
                return response()->json($data);

            }else{
                $address = Address::create([
                    'title'=>'آدرس',
                    'user_id'=>$userId,
                    'name'=>$request->address_model['name'],
                    'lname'=>$request->address_model['lname'],
                    'province_id'=>$request->address_model['province_id'],
                    'city_id'=>$request->address_model['city_id'],
                    'district_id'=>$request->address_model['district_id'],
                    'zipcode'=>$request->address_model['zipcode'],
                    'mobile'=>$request->address_model['mobile'],
                    'lat'=>$request->address_model['lat'],
                    'lng'=>$request->address_model['lng'],
                    'company'=>$request->address_model['company'],
                    'email'=>$request->address_model['email'],
                    'content'=>$request->address_model['content'],
                ]);

                $data['step'] = 3;
                $data['text'] = 'انتخاب زمان تحویل';
                $data['class'] = 'alert';
                $data['address'] = $address->id;
                return response()->json($data);
            }

        }


        if ($data['step'] == 3) {


            if (!$delivery) {
                $data['step'] = 3;
                $data['text'] = 'تاریخ تحویل را مشخص نمایید';
                $data['class'] = 'alert';
                return response()->json($data);
            }


            $data['step'] = 4;
            $data['typeSend'] = $request->typeSend;
            $data['delivery'] = $delivery;
            $data['text'] = 'درگاه پرداخت را انتخاب کنید.';
            $data['class'] = 'alert';

            return response()->json($data);

        } else {

            $data['step'] = 1;
            $data['text'] = 'دامه فرآیند خرید';
            $data['class'] = 'alert';

        }

    }
}
