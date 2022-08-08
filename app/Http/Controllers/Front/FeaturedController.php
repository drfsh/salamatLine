<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;

class FeaturedController extends Controller
{
	use SEOToolsTrait;

	public function main()
	{
		$this->seo()->setTitle('محصولات برگزیده');
		$data['product'] = Product::published()->where('featured',1)->orderBy('active', 'desc')->latest()->paginate(20);
		// return $data;
		return view('front.discount.main',compact('data'));
	}
}
