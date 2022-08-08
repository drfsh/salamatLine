<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use Session;
use Image;
use Storage;
use File;

class BannerController extends Controller
{
    public function __construct() {
        $this->middleware(['auth', 'isAdmin']);
    }

    public function index()
    {
        $banners = Banner::orderBy('id', 'desc')->paginate(5);
        return view('admin.banner.index',compact('banners'));
    }

    public function create()
    {
        return view('admin.banner.create');
    }

    public function store(Request $request)
    {
        $banner = new Banner;
        $banner->title = $request->title;
        $banner->pos = $request->pos;
        $banner->link = $request->link;

        if ($request->active) {
            $banner->active = 1;
        }else{
            $banner->active = 0;
        }

        if ($request->hasFile('featured_image')) {
            $image = $request->file('featured_image');
            $filenameWithExt = $image->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $image->getClientOriginalExtension();
            $fileNameToStore = $request->title.'_'.time().'.'.$extension;
            $location = public_path('img/banner/' . $fileNameToStore);
            $location2 = public_path('img/banner/tiny/' . $fileNameToStore);
            Image::make($image)->save($location);
            Image::make($image)->fit(300,150)->save($location2);
            $banner->image = $fileNameToStore;
        }

        $banner->save();

        Session::flash('success', 'بنر ایجاد شد');
        return redirect()->route('banner.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $banner = Banner::findOrFail($id);
        return view('admin.banner.edit', compact('banner'));
    }

    public function update(Request $request, $id)
    {
        $banner = Banner::findOrFail($id);
        $banner->title = $request->input('title');
        $banner->pos = $request->input('pos');
        $banner->link = $request->input('link');

        if ($request->active) {
            $banner->active = 1;
        }else{
            $banner->active = 0;
        }

        if ($request->hasFile('featured_image')) {
            $image = $request->file('featured_image');
            $filenameWithExt = $image->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $image->getClientOriginalExtension();
            $fileNameToStore = $request->title.'_'.time().'.'.$extension;
            $location = public_path('img/banner/' . $fileNameToStore);
            $location2 = public_path('img/banner/tiny/' . $fileNameToStore);
            Image::make($image)->save($location);
            Image::make($image)->fit(300,150)->save($location2);
            $oldFilename = $banner->image;
            $banner->image = $fileNameToStore;

            Storage::delete('img/banner/' . $oldFilename);
            Storage::delete('img/banner/tiny/' . $oldFilename);
        }

        $banner->save();

        Session::flash('success', 'بنر ویرایش شد');
        return redirect()->route('banner.index');
    }

    public function destroy($id)
    {
        $banner = Banner::find($id);
        File::delete('images/banner/' .$banner->image);
        File::delete('images/banner/tiny/' .$banner->image);
        $banner->delete();
        Session::flash('success', 'بنر حذف شد');
        return redirect()->route('banner.index');
    }
}
