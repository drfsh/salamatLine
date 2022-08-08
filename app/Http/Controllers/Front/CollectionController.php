<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Collection;
Use Redirect;
use Artesaos\SEOTools\Facades\SEOTools;

class CollectionController extends Controller
{
    public function holder()
	{
		SEOTools::setTitle('مجموعه‌ها');
		$data['collections'] = Collection::all();
		return view('front.collection.holder.main', compact('data'));
	}

    public function main($slug)
	{
		$data['collection'] = Collection::where('slug', $slug)->first();
		if (!$data['collection']) {return Redirect::route('home');}
		SEOTools::setTitle($data['collection']->title);
		$data['products'] = $data['collection']->products()->published()->orderBy('active', 'desc')->latest()->paginate(28);
		$data['other'] = Collection::latest()->where('id','!=',$data['collection']->id)->limit(8)->get();
		return view('front.collection.main.main', compact('data'));
	}

}
