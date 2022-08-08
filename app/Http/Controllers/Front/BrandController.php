<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Product;
Use Redirect;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;

class BrandController extends Controller
{
	use SEOToolsTrait;

	public function holder()
	{
		$this->seo()->setTitle('برندها');
		$data['brand'] = Brand::whereHas('product')->whereNotNull('image')->orderBy('image', 'desc')->paginate(12);
		return view('front.brand.holder.main',compact('data'));
	}

	public function main($slug)
	{

		$data['brand'] = Brand::where('slug',$slug)->first();
		if (!$data['brand']) {return Redirect::route('home');}
		$this->seo()->setTitle($data['brand']->title);
		$data['product'] = Product::published()->where('brand_id',$data['brand']->id)->orderBy('featured', 'desc')->orderBy('active', 'desc')->latest()->paginate(12);
		$data['other'] = Brand::inRandomOrder()->whereNotNull('image')->where('id', '!=' , $data['brand']->id)->limit(10)->get();

		// return $data;
		return view('front.brand.main.main',compact('data'));
	}
}
