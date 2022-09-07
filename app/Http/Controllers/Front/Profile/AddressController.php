<?php

namespace App\Http\Controllers\Front\Profile;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Address;
use Artesaos\SEOTools\Facades\SEOTools;
use Illuminate\Support\Facades\View;

class AddressController extends Controller
{
	public function __construct(){$this->middleware('auth');
        View::share('categories',Category::defaultOrder()->toTree()->get());
    }
	public function main()
	{
		SEOTools::setTitle('مدیریت آدرس‌ها');
		return view('profile.address.main.main');
	}

}