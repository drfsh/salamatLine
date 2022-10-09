<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\City;
use App\Models\Province;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'isAdmin']);
    }

    public function index(Request $request)
    {
        $q = $request->q;

        $city = City::where('title', $q)->first();
        $provinces = Province::where('title', $q)->first();
        if (!is_null($city))
            $city = $city->id;
        else
            $city = '';

        if (!is_null($provinces))
            $provinces = $provinces->title;
        else
            $provinces = '';

        if ($q != null && trim($q) !== '')
            $address = Address::withTrashed()->where('id', $q)
                ->orderBy('id', 'desc')
                ->orWhere('name', 'like', "%$q%")->paginate(30);
        else
            $address = Address::withTrashed()->where('id', 'like', "%$q%")
                ->orWhere('name', 'like', "%$q%")
                ->orWhere('content', 'like', "%$q%")
                ->orWhere('mobile', 'like', "%$q%")
                ->orWhere('city_id', 'like', $city)
                ->orWhere('province_id', 'like', $provinces)
                ->orderBy('id', 'desc')->paginate(30);

        return view('admin.address.index', compact('address'));
    }

}
