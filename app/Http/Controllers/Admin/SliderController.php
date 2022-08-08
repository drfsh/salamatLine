<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use Session;
use Image;
use Storage;
use File;

class SliderController extends Controller
{
    public function __construct() {
        $this->middleware(['auth', 'isAdmin']);
    }

    public function index()
    {
        $sliders = Slider::orderBy('id', 'desc')->paginate(5);
        return view('admin.slider.index',compact('sliders'));
    }

    public function create()
    {
        return view('admin.slider.create');
    }

    public function store(Request $request)
    {
        $slider = new Slider;
        $slider->title = $request->title;
        $slider->link = $request->link;
        $slider->content = $request->content;

        if ($request->active) {
            $slider->active = 1;
        }else{
            $slider->active = 0;
        }

        if ($request->hasFile('featured_image')) {
            $image = $request->file('featured_image');
            $filenameWithExt = $image->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $image->getClientOriginalExtension();
            $fileNameToStore = $request->title.'_'.time().'.'.$extension;
            $location = public_path('img/slider/' . $fileNameToStore);
            $location2 = public_path('img/slider/tiny/' . $fileNameToStore);
            Image::make($image)->fit(1280,640)->save($location);
            Image::make($image)->fit(300,150)->save($location2);
            $slider->image = $fileNameToStore;
        }

        $slider->save();

        Session::flash('success', 'اسلایدر ایجاد شد');
        return redirect()->route('slider.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $slider = Slider::findOrFail($id);
        return view('admin.slider.edit', compact('slider'));
    }

    public function update(Request $request, $id)
    {
        $slider = Slider::findOrFail($id);
        $slider->title = $request->input('title');
        $slider->link = $request->input('link');
        $slider->content = $request->input('content');

        if ($request->active) {
            $slider->active = 1;
        }else{
            $slider->active = 0;
        }

        if ($request->hasFile('featured_image')) {
            $image = $request->file('featured_image');
            $filenameWithExt = $image->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $image->getClientOriginalExtension();
            $fileNameToStore = $request->title.'_'.time().'.'.$extension;
            $location = public_path('img/slider/' . $fileNameToStore);
            $location2 = public_path('img/slider/tiny/' . $fileNameToStore);
            Image::make($image)->fit(1280,640)->save($location);
            Image::make($image)->fit(300,150)->save($location2);
            $oldFilename = $slider->image;
            $slider->image = $fileNameToStore;

            Storage::delete('img/slider/' . $oldFilename);
            Storage::delete('img/slider/tiny/' . $oldFilename);
        }

        $slider->save();

        Session::flash('success', 'اسلایدر ویرایش شد');
        return redirect()->route('slider.index');
    }

    public function destroy($id)
    {
        $slider = Slider::find($id);
        File::delete('img/slider/' .$slider->image);
        File::delete('img/slider/tiny/' .$slider->image);
        $slider->delete();
        Session::flash('success', 'اسلایدر حذف شد');
        return redirect()->route('slider.index');
    }
}
