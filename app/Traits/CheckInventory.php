<?php

namespace App\Traits;
use App\Models\Inventory;
use Cart;
use Auth;
use Illuminate\Support\Facades\Cookie;

trait CheckInventory {
    public function CheckInventory($product_id, $multifeature_id, $multiprice_id, $cart_id, $number) {

        if($multifeature_id == 0 && $multiprice_id == 0){
            $inventory = Inventory::where('product_id', $product_id)->first();
        }elseif($multifeature_id != 0 && $multiprice_id == 0){
            $inventory = Inventory::where('product_id', $product_id)->where('feature_id', $multifeature_id)->first();
        }elseif($multiprice_id != 0 && $multifeature_id == 0){
            $inventory = Inventory::where('product_id', $product_id)->where('price_id', $multiprice_id)->first();
        }elseif($multiprice_id != 0 && $multifeature_id != 0){
            $inventory = Inventory::where('product_id', $product_id)->where('price_id', $multiprice_id)->where('feature_id', $multifeature_id)->first();
        }
        if (!Auth::check()) {
            $userId = Cookie::get("guest_id");
        } else
            $userId = Auth::id();
        $item = Cart::session($userId)->get($cart_id);

        if($item == null){
            if ($inventory && $inventory->qty == 0) {
                return ['situation' => 'warning', 'status' => 'متاسفانه موجودی انبار برای این جنس وجود ندارد'];
            }
        }
        if($item != null){
            if($number > 1){
                if ($inventory && $number > $inventory->qty) {
                    return ['situation' => 'warning', 'status' => 'میزان درخواستی کمتر از موجودی انبار است'];
                }
            }elseif($number = 1){
                if ($inventory && $item->quantity + 1 > $inventory->qty) {
                    return ['situation' => 'warning', 'status' => 'میزان درخواستی کمتر از موجودی انبار است'];
                }
            }
        }
        return ['situation' => 'success'];

    }
}