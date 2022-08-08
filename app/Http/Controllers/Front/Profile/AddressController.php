<?php

namespace App\Http\Controllers\Front\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Address;
use Artesaos\SEOTools\Facades\SEOTools;

class AddressController extends Controller
{
	public function __construct(){$this->middleware('auth');}
	public function main()
	{
		SEOTools::setTitle('مدیریت آدرس‌ها');
		return view('profile.address.main.main');
	}

}