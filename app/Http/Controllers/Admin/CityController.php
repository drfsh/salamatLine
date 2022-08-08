<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Province;
use Illuminate\Http\Request;
use Session;

class CityController extends Controller
{
    public function __construct() {
        $this->middleware(['auth', 'isAdmin']);
    }

    public function index()
    {
        $cities = City::orderBy('id', 'desc')->with('province')->paginate(15);
        return view('admin.city.index',compact('cities'));
    }

    public function create()
    {
        $province = Province::all();
        return view('admin.city.create',compact('province'));
    }

    public function store(Request $request)
    {
        $city = new City;
        $city->title = $request->title;
        $city->province_id = $request->province_id;

        $city->save();
        Session::flash('success', 'شهر ایجاد شد');
        return redirect()->route('city.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $city = City::find($id);
        $province = Province::all();
        return view('admin.city.edit',compact('city','province'));
    }

    public function update(Request $request, $id)
    {
        $city = City::find($id);
        $city->title = $request->input('title');
        $city->province_id = $request->input('province_id');
        $city->save();
        Session::flash('success', 'تغییرات ذخیره شد');
        return redirect()->route('city.index');
    }

    public function destroy($id)
    {
        $city = City::find($id);
        $city->delete();
        Session::flash('success', 'شهر حذف شد');
        return redirect()->route('city.index');
    }
}
