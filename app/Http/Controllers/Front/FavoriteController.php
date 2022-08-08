<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Auth;

class FavoriteController extends Controller
{



	public function main()
	{
		if (Auth::check()){
			$user = Auth::user();
			$products = $user->favorite(Product::class);		
			return view('front.favorite.main',compact('products'));
		}else{
			return Redirect::route('home');
		}
	}




	public function Favorite($id){
		if (Auth::check()){
			$post = Product::published()->find($id);
			$post->toggleFavorite();
			if ($post->isFavorited()) {
				return response()->json(['text' => 'به لیست اضافه شد','css' => 'red active']);
			}
			return response()->json(['text' => 'از لیست حذف شد','css' => 'red']);
			
		}else{
			return response()->json(['text' => 'لطفا وارد شوید','css' => 'red']);
		}
    }

}
