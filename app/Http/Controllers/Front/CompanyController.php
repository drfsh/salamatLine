<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Product;
Use Redirect;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;

class CompanyController extends Controller
{
	use SEOToolsTrait;

	public function holder()
	{
		$this->seo()->setTitle('شرکت‌ها');
		$data['company'] = Company::paginate(32);
		return view('front.company.holder.main',compact('data'));
	}

	public function main($slug)
	{
		
		$data['company'] = Company::where('slug',$slug)->first();
		if (!$data['company']) {return Redirect::route('home');}
		$this->seo()->setTitle($data['company']->title);
		$id = $data['company']->id;
		$data['product'] = Product::published()->whereHas('feature', function ($query) use ($id) {$query->where('company_id',$id);})->latest()->paginate(12);
		$data['other'] = Company::inRandomOrder()->where('id', '!=' , $data['company']->id)->limit(10)->get();

		return view('front.company.main.main',compact('data'));
	}
}
