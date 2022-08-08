<?php

namespace App\Traits;
use App\Models\Product;
use App\Models\Multifeature;

trait CheckMultifeature {
    public function CheckMultifeature($product_id,$multifeature_id) {

        $product = Product::find($product_id);
        $multifeature = Multifeature::find($multifeature_id);


        if ($product->multifeature()->exists()) {


            if (!$multifeature_id) {
                return ['situation' => 'warning','status' => 'لطفا یکی از ویژگی‌ها را انتخاب نمایید.'];
            }

            if (!$multifeature) {
                return ['situation' => 'alert','status' => 'ویژگی با این مشخصات یافت نشد.'];
            }

            if ($product->id != $multifeature->product_id) {
                return ['situation' => 'alert','status' => 'ویژگی انتخاب شده مربوط به این محصول نیست!'];
            }
            return ['situation' => 'success','data' =>  $multifeature];
        }
        return ['situation' => 'success','data' =>  $multifeature];


    }
}