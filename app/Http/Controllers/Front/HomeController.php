<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use CyrildeWit\EloquentViewable\Support\Period;
use App\Models\Category;
use App\Models\Country;
use App\Models\Slider;
use App\Models\Order;
use App\Models\Subslider;
use App\Models\Banner;
use App\Models\Brand;
use DB;

class HomeController extends Controller
{
	public function main()
	{
		// ===NotFixed=====
		$situation = 'unpaid';
		$data['most_sell'] =
		Order::whereHas('invoice', function ($query) use ($situation) {$query->where('situation','!=',$situation);})
		->groupBy('product_id')
		// ->whereHas('product', function($q){
		// 	$q->where('active', 1);
		// })
		->with(["product" => function($q){
			$q->published();
		}])
	    ->select('product_id', DB::raw('count(*) as total'))
	    ->orderBy('total', 'desc')
	    ->limit(4)
	    ->get();
		// return $data['most_sell'];

		// ===Fixed=====

		$data['most_view'] = Product::published()->orderByUniqueViews('desc', Period::pastDays(1))->limit(4)->get();

	    $favorite = DB::table('favorites')->groupBy('favoriteable_id')->select(DB::raw('favoriteable_id as id'),DB::raw('count(*) as total'))->orderBy('total', 'desc')->limit(4)->pluck('id')->toArray();
	    $data['most_like'] = Product::published()->find($favorite);
		$data['slider'] = Slider::latest()->select('id','title','link','image','active')->where('active', 1)->get();
		$data['subslider'] = Subslider::select('id','title','link','image')->get();


		$data['banner'] = Banner::select('id','pos','title','link','active','image')->where('page',0)->get();
		$data['country'] = Country::whereHas('product')->whereNotNull('image')->inRandomOrder()->limit(7)->get();


		$data['brand'] = Brand::select('id','title','slug','image')->whereNotNull('image')->inRandomOrder()->limit(7)->get();
		$most_visit_cat_id = Category::orderByUniqueViews('desc', Period::pastDays(1))->limit(6)->get()->pluck('id')->toArray();

        // if ($most_visit_cat_id) {
			foreach ($most_visit_cat_id as $key => $item) {
				$sub_cat_id = Category::descendantsAndSelf($item)->pluck('id')->toArray();
				$count = Product::published()->where('active',1)->withAnyCategories($sub_cat_id)->count();
				if($count > 0){
					$data['category'][$key] = Category::find($item);
					$data['category'][$key]['product'] = Product::published()->where('active',1)->withAnyCategories($sub_cat_id)->limit(8)->get();
				}
			}

        return view('front.home.main',compact('data'));
	}
}
