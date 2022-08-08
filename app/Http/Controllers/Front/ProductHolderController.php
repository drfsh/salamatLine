<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductHolderController extends Controller
{
	public function main()
	{
		$data['products'] = Product::published()->latest()->paginate(20);
		return view('front.product.holder.main',compact('data'));
	}
}
