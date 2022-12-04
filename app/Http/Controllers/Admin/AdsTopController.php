<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ads;
use Illuminate\Http\Request;
use Session;
use Image;
use Storage;
use File;
use Log;

class AdsTopController extends Controller
{

    public function index()
    {
        $menu = Ads::all();
        return view('admin.ads.index',compact('menu'));
    }

    public function create()
    {
        return view('admin.ads.create');
    }

    public function store(Request $request)
    {
        $menu = new Ads();
        $menu->body = $request->body;
        $menu->link = $request->link;
        $menu->color = $request->color;
        $menu->text_color = $request->text_color;

        if ($request->active=='on')
            $menu->active = true;
        else
            $menu->active = false;


        if ($request->hasFile('img')) {
            $image = $request->file('img');
            $filenameWithExt = $image->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $image->getClientOriginalExtension();
            $fileNameToStore = $request->title.'_'.time().'.'.$extension;
            $location = public_path('img/ads/' . $fileNameToStore);
            Image::make($image)->fit(1335,100)->save($location);
            $menu->img = $fileNameToStore;
        }

        $menu->save();
        Session::flash('success', 'منو ایجاد شد');
        return redirect()->route('ads.index');
    }


    public function edit($id)
    {
        $menu = Ads::find($id);
        return view('admin.ads.edit',compact('menu'));
    }

    public function update(Request $request, $id)
    {
        $menu = Ads::find($id);
        $menu->body = $request->body;
        $menu->link = $request->link;
        $menu->color = $request->color;
        $menu->text_color = $request->text_color;
        if ($request->active=='on')
        $menu->active = true;
        else
            $menu->active = false;

        if ($request->hasFile('img')) {
            $image = $request->file('img');
            $filenameWithExt = $image->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $image->getClientOriginalExtension();
            $fileNameToStore = $request->title.'_'.time().'.'.$extension;
            $location = public_path('img/ads/' . $fileNameToStore);
            Image::make($image)->fit(1335,100)->save($location);
            $menu->img = $fileNameToStore;
        }

        $menu->save();
        Session::flash('success', 'تغییرات ذخیره شد');
        return redirect()->route('ads.index');
    }

    public function destroy($id)
    {
        $menu = Ads::find($id);
        $menu->delete();
        Session::flash('success', ' حذف شد');
        return redirect()->route('ads.index');
    }
}
