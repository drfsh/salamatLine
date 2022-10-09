<?php

namespace App\Http\Controllers\Front\Cart;

use App\Http\Controllers\Controller;
use App\Models\Discount;
use App\Models\Product;
use App\Traits\CheckInventory;
use App\Traits\CheckMultiFeature;
use App\Traits\CheckMultiprice;
use App\Traits\Shipping;
use Auth;
use Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;
use Log;
use Response;

class AddToCartController extends Controller
{

    use CheckMultiprice, CheckMultifeature, CheckInventory, Shipping;

    public function main($id, Request $request)
    {
        if (!Auth::check()) {
            $userId = Cookie::get("guest_id");
        } else
            $userId = Auth::id();

        $product = Product::findOrFail($id);
        $multiprice_id = $request->mp;
        $multifeature_id = $request->mf;
        $discount_id = null;
        $discount_price = 0;

        $CheckMultiPrice = $this->CheckMultiprice($id, $multiprice_id);
        if ($CheckMultiPrice['situation'] != 'success') {
            return response()->json(['situation' => $CheckMultiPrice['situation'], 'status' => $CheckMultiPrice['status']]);
        }


        $CheckMultiFeature = $this->CheckMultifeature($id, $multifeature_id);
        if ($CheckMultiFeature['situation'] != 'success') {
            return response()->json(['situation' => $CheckMultiFeature['situation'], 'status' => $CheckMultiFeature['status']]);
        }

        $price = $product->price;
        $feature_des = null;
        $price_des = null;
        $pid = $product->id;
        $mid = 0;
        $fid = 0;


        if (!$multiprice_id && !$multifeature_id) {
            $id = $product->id;
        }
        if ($multifeature_id != null) {
            $fid = $CheckMultiFeature['data']['id'];
            $feature_des = $CheckMultiFeature['data']['title'];
        }

        if ($multiprice_id != null) {
            $mid = $multiprice_id;
            $price = $CheckMultiPrice['data']['price'];
            $price_des = $CheckMultiPrice['data']['title'];
        }

        $id = $pid . '-' . $mid . '-' . $fid;
        $cart_item = Cart::session($userId)->get($id);

        $CheckInventory = $this->CheckInventory($pid, $fid, $mid, $id, 1);
        if ($CheckInventory['situation'] != 'success') {
            return response()->json(['situation' => $CheckInventory['situation'], 'status' => $CheckInventory['status']]);
        }


        $size = $product->feature->getRawOriginal('transport');
        // Log::info($multiPrice_id);
        // Log::info($multiFeature_id);

        if ($product->discount()->exists()) {
            // log::info($product->discount);
            foreach ($product->discount as $item) {

                // Log::info($item);

                // agar chand gheymati va chand vijegi dashte bashad
                if (($mid != 0 && $fid != 0) && ($fid == $item->feature_id && $mid == $item->price_id)) {
                    $discount_id = $item->id;
                    $discount_price = $item->price;

                    // agar faghat featur dashte bashad
                } elseif (($mid == 0 && $fid != 0) && ($fid == $item->feature_id)) {
                    $discount_id = $item->id;
                    $discount_price = $item->price;
                    // agar faghat multi price dashtre bashad
                } elseif (($mid != 0 && $fid == 0) && ($mid == $item->price_id)) {
                    $discount_id = $item->id;
                    $discount_price = $item->price;
                    // agar tak gheymati bashad
                } elseif (($mid == 0 && $fid == 0) && (!$item->price_id && !$item->feature_id)) {
                    $discount_id = $item->id;
                    $discount_price = $item->price;
                }

                $allowed_number = $item->max_uses - $item->uses;
                if ($cart_item && $cart_item->attributes->discount_id == $item->id && ($cart_item->quantity + 1) > $allowed_number) {

                    return response()->json(['situation' => 'warning', 'status' => 'فقط ' . $allowed_number . ' عدد تخفیف باقی مانده است']);
                }
            }

        }


        \Cart::session($userId)->add(array(
            'id' => $id,
            'name' => $product->title,
            'price' => $price - $discount_price,
            'quantity' => $request->quantity,
            'attributes' => array(
                'pid' => $pid,
                'mid' => $mid,
                'fid' => $fid,
                'feature' => $feature_des,
                'price_des' => $price_des,
                'img' => $product->tiny,
                'slug' => $product->slug,
                'size' => $size,
                'original_price' => $price,
                'discount_price' => $discount_price,
                'discount_id' => $discount_id

            ),
            // 'associatedModel' => $product
        ));

        $this->Shipping();
        // Log::info($product);
        return response()->json(['situation' => 'success', 'status' => null]);
    }

    public function items()
    {
        if (!Auth::check()) {
            $userId = Cookie::get("guest_id");
        } else
            $userId = Auth::id();

        $CartItems = Cart::session($userId)->getContent();
        // $Total = Cart::session($userId)->getTotal();
        // $TotalQTY = Cart::session($userId)->getTotalQuantity();


        foreach ($CartItems as $item) {
            if ($item) {
                $item->status = ['ok' => true, 'log' => ''];
                $discount_id = $item->attributes->discount_id;
                if (!is_null($discount_id)) {
                    $discount = Discount::find($discount_id);
                    if (!$discount->isAcrice)
                        $item->status = ['ok' => false, 'log' => 'زمان تخفیف تمام شده است'];
                }
            }
        }

        return $CartItems;

    }


}
