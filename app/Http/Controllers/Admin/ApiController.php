<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Company;
use App\Models\Country;
use App\Filters\ProductFilter;

class ApiController extends Controller
{

    public function __construct() {
        $this->middleware(['auth', 'isAdmin']);
    }

    public function product(ProductFilter $filters)
    {
        $product = Product::latest()->with('brand','country','multiprice')->filter($filters);
        return $product;
    }

    public function category()
    {
        $data = Category::latest()->get();
        return $data;
    }


    public function brand()
    {
        $data = Brand::latest()->select('id','title')->get();
        return $data;
    }


    public function company()
    {
        $data = Company::latest()->select('id','title')->get();
        return $data;
    }


    public function country()
    {
        $data = Country::select('id','title')->get();
        return $data;
    }


}
