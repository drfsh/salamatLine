<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Restock;
use Auth;

class ReStockController extends Controller
{
	public function main($id)
	{
		
		$user = Auth::user();

		if(!$user) {
			return response()->json(['status' => 'جهت ثبت درخواست لطفا وارد شوید','color' => 'warning','error'=>'true']);
		}
		if (!$user->mobile) {
			return response()->json(['status' => 'شماره موبایل شما ثبت نشده است','color' => 'warning']);
		}

		$old = Restock::where('user_id',$user->id)->where('product_id',$id)->first();
		if ($old) {
			return response()->json(['status' => 'درخواست شما پیش از این ثبت شده است','color' => 'warning']);
		}


		$restock = new Restock();
		$restock->user_id = $user->id;
		$restock->product_id = $id;
		$restock->save();


		return response()->json(['status' => 'درخواست شما با موفقیت ثبت شد','color' => 'success']);
	}
}
