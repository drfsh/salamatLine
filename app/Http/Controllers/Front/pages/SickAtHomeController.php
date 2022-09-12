<?php

namespace App\Http\Controllers\Front\pages;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class SickAtHomeController extends Controller
{
    function index(){


        $data['category'] = [
            "id" => 0,
            "slug" => "/sick-at-home",
            "name" => "بیمار در منزل",
            "description" => null,
            "parent_id" => null,
            "created_at" => "2021-03-01T14:32:53.000000Z",
            "updated_at" => "2022-09-02T18:24:55.000000Z",
            "deleted_at" => null,
            "hide" => 0];
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
        $data['products'] = Product::published()
            // ->orderBy('featured', 'desc')
            ->orderBy('active', 'desc')
            ->withAnyCategories($sub_cat_id)
            ->paginate(12);



        $data['show'] = ['in' => (($data['products']->currentPage() - 1) * $data['products']->perPage()) + 1,
            'to' => (($data['products']->currentPage()) * $data['products']->perPage())];

        // return $data;
        return view('front.category.main.main', compact('data'));
    }
}
