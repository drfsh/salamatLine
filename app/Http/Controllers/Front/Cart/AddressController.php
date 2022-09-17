<?php

namespace App\Http\Controllers\Front\Cart;

use App\Http\Controllers\Controller;
// use Illuminate\Http\Request;
use Auth;
use App\Models\Address;
use App\Models\Province;
use App\Models\City;
use App\Models\District;
use App\Http\Requests\NewAddress;
// use Log;

class AddressController extends Controller
{


	public function MyAddress()
	{
		$userId = Auth::id();
		$address = Address::where('user_id',$userId)->with('province','city','district')->latest()->get();
		return $address;
	}

	public function new(NewAddress $request)
	{
		$userId = Auth::id();
		// Log::info($form['title']);
		$address = new Address();
		$address->title = $request->title;
		$address->lname = $request->lname;
		$address->name = $request->name;
		$address->user_id = $userId;
		$address->province_id = $request->province_id;
		$address->city_id = $request->city_id;
		$address->district_id = $request->district_id;
		$address->content = $request->content;
		$address->zipcode = $request->zipcode;
		$address->mobile = '0'.$request->mobile;

        $address->lng = $request->lng;
        $address->lat = $request->lat;
        $address->company = $request->company;

		$address->save();


		return response()->json(['success' => 'آدرس جدید ایجاد شد.']);
	}

	public function update(NewAddress $request, $id){

        $address = Address::find($id);
        $userId = Auth::id();
		if($address->user_id == $userId){
			$address->title = $request->title;
			$address->name = $request->name;
			$address->lname = $request->lname;
			$address->user_id = $userId;
			$address->province_id = $request->province_id;
			$address->city_id = $request->city_id;
			$address->district_id = $request->district_id;
			$address->content = $request->content;
			$address->zipcode = $request->zipcode;
			$address->mobile = '0'.$request->mobile;
			$address->lng = $request->lng;
			$address->lat = $request->lat;
			$address->company = $request->company;

			$address->save();

			return response()->json(['success' => 'آدرس ویرایش شد.']);

		}else{
			Session::flash('success', 'این آدرس متعلق به شما نمی باشد');
			return Redirect::route('ProfileAddress');
		}
	}

	public function delete($id)
	{
		$userId = Auth::id();
		$address = Address::find($id);

		if ($address && $address->user_id == $userId ) {
			$address->delete();
			return response()->json(['success' => 'همچین مشخصاتی قبلا وارد شده.']);
		}
	}


	public function province()
	{
		$province = Province::select('id','title')->get();
		return $province;
	}
	public function city($id)
	{
		$city = City::select('id','title','province_id')->where('province_id',$id)->get();
		return $city;
	}
	public function district($id)
	{
		$district = District::select('id','title','city_id')->where('city_id',$id)->get();
		return $district;
	}





}
