<?php

namespace App\Traits;

use Auth;
use Cart;
use Illuminate\Support\Facades\Cookie;

// use Log;

trait Shipping
{
    public function Shipping()
    {
        if (!Auth::check())
            $userId = Cookie::get("guest_id");
        else
            $userId = Auth::id();

        $until_free = 0;
        $small_shipp = 0;
        $medium_shipp = 0;
        $big_shipp = 0;
        $huge_shipp = 0;

        $small_free_price = 0;
        $medium_free_price = 0;
        $big_free_price = 0;
        $huge_free_price = 0;

        $free = false;
        $plan = 'small';

        $price = $small_shipp;


        $free_plan = null;


        $small_plan = true;
        $medium_plan = false;
        $big_plan = false;
        $huge_plan = false;
        $CartItems = Cart::session($userId)->getContent();
        $qty = Cart::session($userId)->getTotalQuantity();

        $total = Cart::session($userId)->getSubTotal();
        // $total = Cart::session($userId)->getTotal();

        foreach ($CartItems as $item) {
            // if ($item->attributes['size'] == 'small') {
            // 	$small_count = $small_count + $item->quantity;
            // }

            if ($item->attributes['size'] == 'medium') {
                $medium_plan = true;
            }
            if ($item->attributes['size'] == 'big') {
                $big_plan = true;
            }
            if ($item->attributes['size'] == 'huge') {
                $huge_plan = true;
            }
        }


        if ($huge_plan || $big_plan) {
            $plan = 'big';
        } else if ($medium_plan) {
            $plan = 'medium';
        }


        if ($plan == 'big' && $total >= $huge_free_price) {
            $price = 0;
            $free = true;
        } else if ($plan == 'big') {
            $price = $huge_shipp;
            $free = false;
            $until_free = $huge_free_price - $total;
            $free_plan = 'بزرگ';
        }


        if ($plan == 'medium' && $total >= $medium_free_price) {
            $price = 0;
            $free = true;
        } else if ($plan == 'medium') {
            $price = $medium_shipp;
            $free = false;
            $until_free = $medium_free_price - $total;
            $free_plan = 'متوسط';

        }

        if ($plan == 'small' && $total >= $small_free_price) {
            $price = 0;
            $free = true;
        } else if ($plan == 'small') {
            $price = $small_shipp;
            $free = false;
            $until_free = $small_free_price - $total;
            $free_plan = 'کوچک';
        }
        // Log::info($plan);

        if ($qty > 0) {
            $condition = new \Darryldecode\Cart\CartCondition(array(
                'name' => 'Shipping',
                'type' => 'shipping',
                'target' => 'total',
                'value' => $price,
                'attributes' => array(
                    'free' => $free,
                    'until_free' => $until_free,
                    'free_plan' => $free_plan
                    // 'small' => $small_count,
                    // 'medium' => $medium_count,
                    // 'big' => $big_count,
                    // 'huge' => $huge_count,
                )
            ));
            Cart::session($userId)->condition($condition);
        } else {
            Cart::session($userId)->removeCartCondition('Shipping');
        }

    }
}