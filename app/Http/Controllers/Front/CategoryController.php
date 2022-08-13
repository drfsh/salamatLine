<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
// use App\Filters\ProductFilter;
use Redirect;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;
use Artesaos\SEOTools\Facades\SEOTools;

class CategoryController extends Controller
{

	use SEOToolsTrait;

	public function holder()
	{
		SEOTools::setTitle('دسته‌بندی‌ها');
		$categories = Category::defaultOrder()->get()->toTree();
		return view('front.category.holder.main',compact('categories'));
	}




	public function main($slug,Request $request)
	{


		$data['category'] = Category::where('slug', $slug)->first();
		// $rootId = $data['category'];

		if (!$data['category']) {
			return Redirect::route('home');
		}
		views($data['category'])->cooldown(1440)->record();
		$this->seo()->setTitle($data['category']->name);

		$cat_id = $data['category']->id;
		// $data['sub_cats'] = $data['category']->descendants()->where('parent_id',$cat_id)->get();

		$data['sub_cats'] = $data['category']->descendants()->get()->toTree();

		$sub_cat_id  = Category::descendantsAndSelf($cat_id)->pluck('id')->toArray();

		// if ($request->page == null) {$filters = app(ProductFilter::class)->parameters(['page' => 1]);}
		// $data['products'] = Product::published()->withAnyCategories($sub_cat_id)->filter($filters);
		$data['products'] = Product::published()
		// ->orderBy('featured', 'desc')
		->orderBy('active', 'desc')
		->withAnyCategories($sub_cat_id)
		->paginate(12);
		// return $data;
		return view('front.category.main.main',compact('data'));
	}
}
