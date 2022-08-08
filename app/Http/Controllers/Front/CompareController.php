<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Filters\ProductFilter;

class CompareController extends Controller
{
	public function main($slug)
	{
		$product = Product::published()->where('slug',$slug)->with('feature.material','brand','country')->first();
		$relate = Product::published()->inRandomOrder()->limit(12)->select('id','title','image')->get();
		return view('front.compare.main',compact('product','relate'));
	}

	public function add($id)
	{
		$product = Product::where('id',$id)->with('feature.material','feature.company','brand','country')->first();
		return $product;
	}


	public function search(Request $request,ProductFilter $filters)
	{


        $per_page = $request->per_page;
        $page = $request->page;
        if(!$per_page || !$page){
            return response()->json(['error' => 'Please specify the per_page or page request'], 401);
        }
        if ($per_page > 30) {
           return response()->json(['error' => 'The maximum per_page allowed is 30'], 401);
        }


		$product = Product::limit(12)->select('id','title','image')->filter($filters); 
		return $product;
	}


}
