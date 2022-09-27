<?php

namespace App\Http\Controllers\Front\Cart;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Cart;
use Response;

class CartDetailController extends Controller
{
	public function main()
	{
		$userId = Auth::id();
		if (!Auth::check()){
			return response()->json(['error' => 'please login']);
		}

		$shipping = Cart::session($userId)->getCondition('Shipping');
		$coupon = Cart::session($userId)->getCondition('coupon');





		if ($shipping && false) {
			$shipping_price = $shipping->getValue();
			$shippinh_att = $shipping->getAttributes();
		}else{
			$shipping_price = 0;
			$shippinh_att = null;
		}


		$shipping_arry = [
			'price' => $shipping_price,
			'attributes' => $shippinh_att

		];


		if ($coupon) {
			$coupon_price = $coupon->getValue();
		}else{
			$coupon_price = 0;
		}


		$data['sub_total'] = Cart::session($userId)->getSubTotal();
		$data['total'] = Cart::session($userId)->getSubTotal();
		$data['qty'] = Cart::session($userId)->getTotalQuantity();
		$data['coupon'] = $coupon_price;
		$data['shipping'] = $shipping_arry;

		// Log::info($product);
		return $data;
	}

}
