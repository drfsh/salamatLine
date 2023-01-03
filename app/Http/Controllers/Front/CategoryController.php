<?php

namespace App\Http\Controllers\Front;

use App\Filters\ProductFilter;
use App\Http\Controllers\Controller;
use App\Models\Category_relation;
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
        $category = $data['category'];
//        return $category->toJson();
        // $rootId = $data['category'];

        if (!$data['category']) {
            return Redirect::route('home');
        }

        $name = $data['category']->name;

//        views($data['category'])->cooldown(1440)->record();
        $this->seo()->setTitle($data['category']->name);

        $cat_id = $data['category']->id;
        // $data['sub_cats'] = $data['category']->descendants()->where('parent_id',$cat_id)->get();

        $data['sub_cats'] = $data['category']->parent_cat;
        $sub_cat_id = Category_relation::getAllChildId($cat_id);

        // if ($request->page == null) {$filters = app(ProductFilter::class)->parameters(['page' => 1]);}
        // $data['products'] = Product::published()->withAnyCategories($sub_cat_id)->filter($filters);
        if ($request->active == null || $request->active == 'false')
            $data['products'] = Product::published()->with('feature')
                // ->orderBy('featured', 'desc')
                ->where([['price', '>=', $p1 * 10], ['price', '<=', $p2 * 10]])
                ->orderBy('active', 'desc')
                ->orderBy($order_by, $f)
                ->withAnyCategories($sub_cat_id)
                ->paginate(8);
        else if ($request->active == 'true')
            $data['products'] = Product::published()->with('feature')
                // ->orderBy('featured', 'desc')
                ->where('active', true)
                ->where([['price', '>=', $p1 * 10], ['price', '<=', $p2 * 10]])
                ->orderBy($order_by, $f)
                ->withAnyCategories($sub_cat_id)
                ->paginate(8);

        $data['show'] = ['in' => (($data['products']->currentPage() - 1) * $data['products']->perPage()) + 1,
            'to' => (($data['products']->currentPage()) * $data['products']->perPage())];

        return view('front.category.main.main', compact('category', 'cat_id'));
    }

    public function getCategories()
    {
        $cars = Category::getRoot();
        foreach ($cars as $x) {
            $x['child'] = $x->child_cats;
            foreach ($x['child'] as $y) {
                $y['child'] = $y->child_cats;
                foreach ($y['child'] as $z) {
                    $z['child'] = $z->child_cats;
                    foreach ($z['child'] as $i) {
                        $i['child'] = $i->child_cats;
                    }
                }
            }
        }

        return response()->json($cars);
    }

    public function getProductCat(Request $request, $id)
    {

        $pageNum = $request->page;
        $price = $request->price;
        $onlyActive = $request->onlyActive;
        $sort = $request->sort;

        if ($sort == null) {
            $order_by = 'id';
            $f = 'desc';
        }else if($sort=='new'){
            $order_by = 'created_at';
            $f = 'desc';
        }else if ($sort=='old'){
            $order_by = 'created_at';
            $f = 'asc';
        }else if ($sort=='price_down'){
            $order_by = 'price';
            $f = 'asc';
        }else if ($sort=='price_up'){
            $order_by = 'price';
            $f = 'desc';
        }

        $sub_cat_id = Category_relation::getAllChildId($id);

        $wp = [];
        if ($price[0]!=-1)
            $wp = [['price', '>=', $price[0] * 10], ['price', '<=', $price[1] * 10]];
        if ($onlyActive == 'true')
            $wp[] = ['active', true];

        $products = Product::published()->with('feature')
            // ->orderBy('featured', 'desc')
            ->where($wp)
            ->orderBy('active', 'desc')
            ->with('multiprice', 'multifeature','feature','photos', 'brand', 'country', 'inventory', 'discount', 'collection')
            ->orderBy($order_by, $f)
            ->withAnyCategories($sub_cat_id)
            ->paginate($perPage = 12, $columns = ['*'], $pageName = 'page', $page = $pageNum);

        return response()->json($products);
    }

    public function getChildCat(Request $request)
    {
        $id = $request->id;
        $category = Category::find($id);
        $sub_cats = $category->child_cats;


        return response()->json($sub_cats);
    }
    public function install(Request $request)
    {
//        $step = $request->step;
//        if ($step==1){
//            $cat = Category::where('parent_id',null)->get();
//            foreach ($cat as $v){
//                Category_relation::create([
//                   'category_id'=>$v->id,
//                   'parent_id'=>0,
//                ]);
//            }
//        }else if ($step==2){
//
//        }
//        $relation = Category_relation::all();
//        return $relation;
    }
}
