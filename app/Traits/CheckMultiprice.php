<?php

namespace App\Traits;
use App\Models\Product;
use App\Models\Multiprice;

trait CheckMultiprice {
    public function CheckMultiprice($product_id,$multiprice_id) {

        $product = Product::find($product_id);
        $multiprice = Multiprice::find($multiprice_id);


        if ($product->multiprice()->exists()) {


            if (!$multiprice_id) {
                return ['situation' => 'warning','status' => 'لطفا یکی از قیمت ها را انتخاب نمایید.'];
            }

            if (!$multiprice) {
                return ['situation' => 'alert','status' => 'قیمتی با این مشخصات یافت نشد!'];
            }

            if ($product->id != $multiprice->product_id) {
                return ['situation' => 'alert','status' => 'قیمت متعلق به محصول نیست'];
            }
            return ['situation' => 'success','data' => $multiprice];
        }
        return ['situation' => 'success','data' => $multiprice];


    }
}