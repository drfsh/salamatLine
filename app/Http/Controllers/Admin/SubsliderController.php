<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subslider;
use Session;
use Image;
use Storage;
use File;

class SubsliderController extends Controller
{
    public function __construct() {
        $this->middleware(['auth', 'isAdmin']);
    }

    public function index()
    {
        $subsliders = Subslider::all();
        $subcount = Subslider::count();
        return view('admin.subslider.index', compact('subsliders', 'subcount'));
    }

    public function create()
    {
        $subcount = Subslider::count();
        if($subcount < 2){
            return view('admin.subslider.create');
        }else{
            Session::flash('success', 'شما فقط اجازه ویرایش یک مورد را دارید و نمیتوانید مورد هدر دیگری ایجاد کنید');
            return redirect()->route('subslider.index');
        }
    }

    public function store(Request $request)
    {
        $subslider = new Subslider;
        $subslider->title = $request->title;
        $subslider->link = $request->link;
        $subslider->content = $request->content;

        if ($request->hasFile('featured_image')) {
            $image = $request->file('featured_image');
            $filenameWithExt = $image->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $image->getClientOriginalExtension();
            $fileNameToStore = $request->title.'_'.time().'.'.$extension;
            $location = public_path('img/subslider/' . $fileNameToStore);
            $location2 = public_path('img/subslider/tiny/' . $fileNameToStore);
            Image::make($image)->fit(640,310)->save($location);
            Image::make($image)->fit(200,97)->save($location2);
            $subslider->image = $fileNameToStore;
        }

        $subslider->save();

        Session::flash('success', 'اسلایدر ایجاد شد');
        return redirect()->route('subslider.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $subslider = Subslider::find($id);
        return view('admin.subslider.edit',compact('subslider'));
    }

    public function update(Request $request, $id)
    {
        $subslider = Subslider::findOrFail($id);
        $subslider->title = $request->input('title');
        $subslider->link = $request->input('link');
        $subslider->content = $request->input('content');

        if ($request->hasFile('featured_image')) {
            $image = $request->file('featured_image');
            $filenameWithExt = $image->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $image->getClientOriginalExtension();
            $fileNameToStore = $request->title.'_'.time().'.'.$extension;
            $location = public_path('img/subslider/' . $fileNameToStore);
            $location2 = public_path('img/subslider/tiny/' . $fileNameToStore);
            Image::make($image)->fit(640,310)->save($location);
            Image::make($image)->fit(200,97)->save($location2);
            $oldFilename = $subslider->image;
            $subslider->image = $fileNameToStore;

            Storage::delete('img/subslider/' . $oldFilename);
            Storage::delete('img/subslider/tiny/' . $oldFilename);
        }

        $subslider->save();

        Session::flash('success', 'اسلایدر ویرایش شد');
        return redirect()->route('subslider.index');
    }

    public function destroy($id)
    {
        //
    }
}
