<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Province;
use Illuminate\Http\Request;
use Session;

class ProvinceController extends Controller
{
    public function __construct() {
        $this->middleware(['auth', 'isAdmin']);
    }

    public function index()
    {
        $provinces = Province::orderBy('id', 'desc')->paginate(15);
        return view('admin.province.index',compact('provinces'));
    }

    public function create()
    {
        return view('admin.province.create');
    }

    public function store(Request $request)
    {
        $province = new Province;
        $province->title = $request->title;

        $province->save();
        Session::flash('success', 'استان ایجاد شد');
        return redirect()->route('province.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $province = Province::find($id);
        return view('admin.province.edit', compact('province'));
    }

    public function update(Request $request, $id)
    {
        $province = Province::find($id);
        $province->title = $request->input('title');
        $province->save();
        Session::flash('success', 'تغییرات ذخیره شد');
        return redirect()->route('province.index');
    }

    public function destroy($id)
    {
        $province = Province::find($id);
        $province->delete();
        Session::flash('success', 'استان حذف شد');
        return redirect()->route('province.index');
    }
}
