<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;
use Auth;
use Illuminate\Support\Facades\View;

class FavoriteController extends Controller
{


    public function __construct()
    {
        View::share('categories', Category::defaultOrder()->toTree()->get());
    }

    public function main()
    {
        if (Auth::check()) {
            $user = Auth::user();
            $products = $user->favorite(Product::class);
            return view('profile.favorite.main', compact('products'));
        } else {
            return Redirect('login');
        }
    }


    public function Favorite($id)
    {
        if (Auth::check()) {
            $post = Product::published()->find($id);
            $post->toggleFavorite();
            if ($post->isFavorited()) {
                return response()->json(['status' => 'true', 'add' => 'true']);
            }
            return response()->json(['status' => 'true', 'add' => 'false']);

        } else {
            return response()->json(['status' => 'false']);
        }
    }

    public function count()
    {

        if (Auth::check()) {
            $user = Auth::user();
            $products = $user->favorite(Product::class);
            return response()->json(['count'=>$products->count()]);
        }
        else{
            return response()->json(['count'=>0]);
        }
    }

}
