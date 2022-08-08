<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\City;
use Illuminate\Http\Request;
use Session;

class DistrictController extends Controller
{
    public function __construct() {
        $this->middleware(['auth', 'isAdmin']);
    }

    public function index()
    {
        $districts = District::orderBy('id', 'desc')->with('city')->paginate(15);
        return view('admin.district.index', compact('districts'));
    }

    public function create()
    {
        $city = City::all();
        return view('admin.district.create', compact('city'));
    }

    public function store(Request $request)
    {
        $district = new District;
        $district->title = $request->title;
        $district->city_id = $request->city_id;
        $district->save();
        Session::flash('success', 'منطقه ایجاد شد');
        return redirect()->route('district.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $city = City::all();
        $district = District::find($id);
        return view('admin.district.edit', compact('district','city'));
    }

    public function update(Request $request, $id)
    {
        $district = District::find($id);
        $district->title = $request->input('title');
        $district->city_id = $request->input('city_id');
        $district->save();
        Session::flash('success', 'تغییرات ذخیره شد');
        return redirect()->route('district.index');
    }

    public function destroy($id)
    {
        $district = District::find($id);
        $district->delete();
        Session::flash('success', 'منطقه حذف شد');
        return redirect()->route('district.index');
    }
}
