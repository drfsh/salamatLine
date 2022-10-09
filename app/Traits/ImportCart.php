<?php

namespace App\Traits;

use Auth;
use Cart;
use Illuminate\Support\Facades\Cookie;

// use Log;

trait ImportCart
{
    public function import()
    {
        $guestId = Cookie::get("guest_id");
        $userId = Auth::id();

        $oldConditions = Cart::session($guestId)->getConditions()['Shipping'];
        $oldContent = Cart::session($guestId)->getContent();

        foreach ($oldContent as $item) {
            Cart::session($userId)->add(array(
                    'id' => $item['id'],
                    'name' => $item['name'],
                    'price' => $item['price'],
                    'quantity' => $item['quantity'],
                    'attributes' => array(
                        'pid' => $item['attributes']['pid'],
                        'mid' => $item['attributes']['mid'],
                        'fid' => $item['attributes']['fid'],
                        'feature' => $item['attributes']['feature'],
                        'price_des' => $item['attributes']['price_des'],
                        'img' => $item['attributes']['img'],
                        'slug' => $item['attributes']['slug'],
                        'size' => $item['attributes']['size'],
                        'original_price' => $item['attributes']['original_price'],
                        'discount_price' => $item['attributes']['discount_price'],
                        'discount_id' => $item['attributes']['discount_id']

                    )
                )
            );
        }
        Cart::session($userId)->condition($oldConditions);


        Cookie::queue(Cookie::forget("guest_id"));
    }
}