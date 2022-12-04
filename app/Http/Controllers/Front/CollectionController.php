<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Product;
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
		$data['page'] = Collection::where('slug', $slug)->first();
		if (!$data['page']) {return Redirect::route('home');}
		SEOTools::setTitle($data['page']->title);

        $productsId = $data['page']->products;

        $data['products'] = [];
        foreach ($productsId as $k=>$item) {
            $data['products'][$k] = [];
            foreach ($item as $id) {
                $data['products'][$k][] = Product::find($id);
            }
        }

        return view('front.collection.main.main', compact('data'));
	}

}
