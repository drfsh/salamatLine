<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\Product;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;

class DiscountController extends Controller
{
	use SEOToolsTrait;

	public function main()
	{
		$this->seo()->setTitle('پیشنهادهای شگفت‌انگیز');
		$data['product'] = Product::published()->whereHas('discount')->latest()->paginate(10);
		// return $data;
		return view('front.discount.main',compact('data'));
	}
}
