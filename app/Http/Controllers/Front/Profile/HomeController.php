<?php

namespace App\Http\Controllers\Front\Profile;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Invoice;
use App\Models\Product;
use CyrildeWit\EloquentViewable\Support\Period;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\View;
use Redirect;
use File;

class HomeController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        View::share('categories',Category::defaultOrder()->toTree()->get());
    }

	public function main()
	{
        $userId = Auth::id();
        $data['most_view'] = Product::published()->orderByUniqueViews('desc', Period::pastDays(1))->limit(4)->get();

        $invoices =Invoice::with('orders.product','orders.detail')->where('user_id', $userId);
        $data['invoice_unpain'] = $invoices->where('situation','unpaid')->count();
        $data['invoice_pain'] = $invoices->where('situation','paid')->count();
        $data['invoice_finish'] = $invoices->where('situation','finish')->count();

        $data['invoice_current'] = $invoices->where('situation','production')
            ->orWhere([['situation','sending'],['user_id', $userId]])
            ->orWhere([['situation','arrived'],['user_id', $userId]])
            ->count();

        return view('profile.home.main',compact('data'));
	}

    public function ChangeProfilePic(Request $request){
        $user = Auth::user();
        $image = $request->file('profile');;

        $imageName = time().'.jpg';

        File::delete($user->avatar);
        \Image::make($image)->fit(400, 400)->save(public_path('img/profile/').$imageName)->orientate();
        $user->avatar = $imageName;
        $user->save();

        return Redirect::back()->withErrors(['تصویر پروفایل با موفقیت آپلود شد.']);

    }


}
