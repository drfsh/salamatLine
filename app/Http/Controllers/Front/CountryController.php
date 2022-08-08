<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\Product;
Use Redirect;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;

class CountryController extends Controller
{
	use SEOToolsTrait;

	public function holder()
	{
		$this->seo()->setTitle('کشورها');
		$data['country'] = Country::whereHas('product')->whereNotNull('image')->paginate(12);
		return view('front.country.holder.main',compact('data'));
	}

	public function main($slug)
	{
		$data['country'] = Country::where('slug',$slug)->first();
		if (!$data['country']) {return Redirect::route('home');}
		$this->seo()->setTitle($data['country']->title);
		$data['product'] = Product::published()->where('country_id',$data['country']->id)->orderBy('featured', 'desc')->orderBy('active', 'desc')->latest()->paginate(12);
		$data['other'] = Country::inRandomOrder()->where('id', '!=' , $data['country']->id)->whereHas('product')->limit(10)->get();

		return view('front.country.main.main',compact('data'));
	}
}
