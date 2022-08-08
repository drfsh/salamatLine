<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Spatie\Searchable\ModelSearchAspect;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Company;
use App\Models\Country;
use Spatie\Searchable\Search;
use Redirect;
use Illuminate\Support\Facades\Log;
use Auth;

class SearchController extends Controller
{
    public function main(Request $request)
    {

    $word =  $request->input('query');  
    if (!$word) {
       return Redirect::route('home');
    }

    $searchResults = (new Search())
    ->registerModel(Product::class, 'title','subtitle','slug')
    ->registerModel(Brand::class, 'title','slug')
    ->registerModel(Company::class, 'title','slug')
    ->registerModel(Country::class, 'title','slug')
    ->limitAspectResults(20)
    ->search($word);
    // return response()->json($searchResults);


    if(Auth::check()){
        Log::channel('search-user')->info('Search:'.$request->input('query').'  ID:'.Auth::id().'  Name:'.Auth::user()->name);
    }else{
        Log::channel('search')->info('Search:'.$request->input('query'));
    }
    return view('front.search.main', compact('searchResults'));
    }

}
