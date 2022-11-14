<?php

namespace App\Http\Controllers\Front;

use App\Filters\ProductFilter;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

// use App\Filters\ProductFilter;
use Illuminate\Support\Facades\View;
use Redirect;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;
use Artesaos\SEOTools\Facades\SEOTools;

class CategoryController extends Controller
{

    use SEOToolsTrait;

    public function holder()
    {
        SEOTools::setTitle('دسته‌بندی‌ها');
        $categories = Category::defaultOrder()->toTree()->get();
//        return response()->json($categories);
        return view('front.category.holder.main', compact('categories'));
    }


    public function main($slug, Request $request)
    {

        $order_by = $request->order_by;
        $p1 = $request->p1;
        if ($p1 == null)
            $p1 = 0;
        $p2 = $request->p2;
        if ($p2 == null)
            $p2 = 10000000000;

        $f = $request->f;
        if ($order_by == null)
            $order_by = 'active';
        if ($f == null)
            $f = 'desc';

        $data['category'] = Category::where('slug', $slug)->hide()->first();

        // $rootId = $data['category'];

        if (!$data['category']) {
            return Redirect::route('home');
        }
        views($data['category'])->cooldown(1440)->record();
        $this->seo()->setTitle($data['category']->name);

        $cat_id = $data['category']->id;
        // $data['sub_cats'] = $data['category']->descendants()->where('parent_id',$cat_id)->get();

        $data['sub_cats'] = $data['category']->descendants()->hide()->get()->toTree();

        $sub_cat_id = Category::descendantsAndSelf($cat_id)->pluck('id')->toArray();

        // if ($request->page == null) {$filters = app(ProductFilter::class)->parameters(['page' => 1]);}
        // $data['products'] = Product::published()->withAnyCategories($sub_cat_id)->filter($filters);
        if ($request->active == null || $request->active == 'false')
            $data['products'] = Product::published()->with('feature')
                // ->orderBy('featured', 'desc')
                ->where([['price', '>=', $p1*10], ['price', '<=', $p2*10]])
                ->orderBy('active', 'desc')
                ->orderBy($order_by, $f)
                ->withAnyCategories($sub_cat_id)
                ->paginate(12);
        else if ($request->active == 'true')
            $data['products'] = Product::published()->with('feature')
                // ->orderBy('featured', 'desc')
                ->where('active', true)
                ->where([['price', '>=', $p1*10], ['price', '<=', $p2*10]])
                ->orderBy($order_by, $f)
                ->withAnyCategories($sub_cat_id)
                ->paginate(12);

        $data['show'] = ['in' => (($data['products']->currentPage() - 1) * $data['products']->perPage()) + 1,
            'to' => (($data['products']->currentPage()) * $data['products']->perPage())];

        // return $data;
        return view('front.category.main.main', compact('data'));
    }

    public function getCategories(){
        $cars = Category::where('hide',false)->defaultOrder()->toTree()->get();
        foreach ($cars as $x){
            $x['child'] = Category::where([['parent_id',$x->id],['hide',false]])->defaultOrder()->get();
            foreach ($x['child'] as $y){
                $y['child'] = Category::where([['parent_id',$y->id],['hide',false]])->defaultOrder()->get();
                foreach ($y['child'] as $z){
                    $z['child'] = Category::where([['parent_id',$z->id],['hide',false]])->defaultOrder()->get();
                    foreach ($z['child'] as $i){
                        $i['child'] = Category::where([['parent_id',$i->id],['hide',false]])->defaultOrder()->get();
                    }
                }
            }
        }
        return response()->json($cars);
    }
}
