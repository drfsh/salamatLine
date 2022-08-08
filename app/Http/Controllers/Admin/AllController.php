<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Multiprice;
use App\Models\Multifeature;
use App\Models\User;
use App\Models\Address;

class AllController extends Controller
{
    public function __construct() {
        $this->middleware(['auth', 'isAdmin']);
    }
    
    public function Products()
	{
		$product = Product::select('id', 'title', 'price')->get();
		return $product;
	}

    public function ProductDetail($id)
	{
		$product = Product::find($id);
		$data['price'] = $product->price;
		$data['prices'] = Multiprice::select('id', 'title', 'price', 'product_id')->where('product_id', $id)->get();
		$data['features'] = Multifeature::select('id', 'title', 'product_id')->where('product_id', $id)->get();
		return $data;
	}

    public function SetMultiPrice($id)
	{
		$data = Multiprice::find($id);
		return $data->price;
	}


	public function Users()
	{
		$users = User::select('id', 'name', 'lname', 'mobile')->get();
		return $users;
	}

	public function Addresses($id)
	{
		$addresses = Address::select('id', 'name', 'title', 'mobile', 'user_id', 'province_id', 'city_id', 'district_id', 'content')->where('user_id', $id)->get();
		return $addresses;
	}
}
