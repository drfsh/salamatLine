<?php

namespace App\Http\Controllers\Front\Cart;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\CheckInventory;
use App\Traits\Shipping;
use Auth;
use Cart;


class StepOneController extends Controller
{
	use CheckInventory,Shipping;
	public function Update(Request $request,$id)
	{
		$userId = Auth::id();
		if (!Auth::check()){
			return response()->json(['error' => 'please login']);
		}
		$number = $request->number;
		
		if($number == 1){
			$item = Cart::session($userId)->get($id);
			$pid = $item->attributes['pid'];
			$fid = $item->attributes['fid'];
			$mid = $item->attributes['mid'];

			$CheckInventory = $this->CheckInventory($pid, $fid, $mid, $id, $number);
			if ($CheckInventory['situation'] != 'success') {
				$data['step'] = 1;
				$data['text'] = 'ادامه فرآیند خرید';
				$data['class'] = 'success expanded';
				$data['situation'] = $CheckInventory['situation'];
				$data['status'] = $CheckInventory['status'];
				return response()->json($data);
			}
		}
		Cart::session($userId)->update($id, array('quantity' => $number));
		$this->Shipping();
		$data['step'] = 1;
		$data['text'] = 'ادامه فرآیند خرید';
		$data['class'] = 'success expanded';
		$data['situation'] = null;
		$data['status'] = null;
		return response()->json($data);
	}

	public function Updaterow(Request $request,$id)
	{
		$userId = Auth::id();
		if (!Auth::check()){
			return response()->json(['error' => 'please login']);
		}
		$number = $request->number;

		$item = Cart::session($userId)->get($id);
		$pid = $item->attributes['pid'];
		$fid = $item->attributes['fid'];
		$mid = $item->attributes['mid'];

		$CheckInventory = $this->CheckInventory($pid, $fid, $mid, $id, $number);
		if ($CheckInventory['situation'] != 'success') {

				$data['step'] = 1;
				$data['text'] = 'ادامه فرآیند خرید';
				$data['class'] = 'success expanded';
				$data['situation'] = $CheckInventory['situation'];
				$data['status'] = $CheckInventory['status'];
				return response()->json($data);
		}

		;
		Cart::session($userId)->update($id, array(
			'quantity' => array(
				'relative' => false,
				'value' => $number
			),
		));
		$this->Shipping();
		$data['step'] = 1;
		$data['text'] = 'ادامه فرآیند خرید';
		$data['class'] = 'success expanded';
		$data['situation'] = null;
		$data['status'] = null;
		return response()->json($data);
	}


	public function RemoveItem($id)
	{
		$userId = Auth::id();
		if (!Auth::check()){
			return response()->json(['error' => 'please login']);
		}
		Cart::session($userId)->remove($id);
		$this->Shipping();

		$data['step'] = 1;
		$data['text'] = 'ادامه فرآیند خرید';
		$data['class'] = 'success expanded';
		$data['situation'] = null;
		$data['status'] = null;


		$qty = Cart::session($userId)->getTotalQuantity();

		if ($qty == 0) {
			$data['step'] = 1;
			$data['text'] = 'سبد شما خالی است.';
			$data['class'] = 'warning expanded';
			$data['situation'] = null;
			$data['status'] = null;
		}

		return response()->json($data);
	}


}
