<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class Products extends Controller
{


    public function main()
    {
        $per_page = 100;
        $products = Product::published()->with('multiprice')->with('multiprice')->where('active', 1)->latest()->paginate($per_page);


        // return $products;

        $data = [];
        $url = url('/') . '/products/';
        $availability = 'instock';
        $price = 0;
        // $data['per_page'] = $per_page;
        $data['current_page'] = $products->currentPage();
        $data['max_pages'] = $products->lastPage();
        // $data['count'] = $products->total();
        // $data['next_page_url'] = $products->nextPageUrl();
        // $data['prev_page_url'] = $products->previousPageUrl();

        $n = 0;
        foreach ($products as $item) {
            $cat_name = null;
            $category = $item->categories()->get()->toFlatTree()->last();

            if ($category) {
                $cat_name = $category->name;
            }
            if (!$item->active) {
                $availability = 'outofstock';
            }
            if ($item['multiprice']->isEmpty()) {
                $price = $item->price / 10;
            } else {
                $price = $item['multiprice'][0]['price'] / 10;
            }
            $data['products'][$n]['product_id'] = $item->id;
            $data['products'][$n]['title'] = $item->title;
            $data['products'][$n]['subtitle'] = $item->subtitle;
            $data['products'][$n]['category_name'] = $cat_name;
            $data['products'][$n]['price'] = $price;
            $data['products'][$n]['image_link'] = $item->tiny;
            $data['products'][$n]['page_url'] = $url . $item->slug;
            $data['products'][$n]['price'] = $price;
            $data['products'][$n]['old_price'] = $price;
            $data['products'][$n]['availability'] = $availability;
            $n++;
        }

        return response()->json($data);
    }

    public function getId($id)
    {
        $product = Product::published()->where('id',$id)->with('multiprice','multifeature','feature','photos','brand','country','inventory','discount','collection')->first();
        return response()->json($product);
    }
}


// {
//     product_id: '...',
//     page_url: '...',
//     price: '...',
//     availability: '...',
//     old_price: '...',
// }