<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\Product;
use App\Http\Requests\CountryCreate;
use App\Http\Requests\CountryUpdate;
use App\Models\Seo;
use Session;
use Image;
use Storage;
use File;

class CountryController extends Controller
{
    public function __construct() {
        $this->middleware(['auth', 'isAdmin']);
    }

    public function index()
    {
        $countries = Country::paginate(20); 
        return view('admin.country.index', compact('countries'));
    }

    public function create()
    {
        return view('admin.country.create');
    }

    public function store(CountryCreate $request)
    {
        $country = new Country;
        $country->title = $request->title;
        $country->slug = $request->slug;
        $country->content = $request->content;
        if ($request->hasFile('featured_image')) {
            $image = $request->file('featured_image');
            $filenameWithExt = $image->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $image->getClientOriginalExtension();
            $fileNameToStore = $request->slug.'.'.$extension;
            $location = public_path('img/country/' . $fileNameToStore);
            Image::make($image)->fit(512,512)->save($location);
            $country->image = $fileNameToStore;
        }

        $country->save();

        if ($request->metadesc || $request->keywords){
            $seo = new Seo;
            $seo->metadesc = $request->metadesc;
            $seo->keywords = $request->keywords;
            $country->seo()->save($seo);
        }

        Session::flash('success', 'کشور سازنده ایجاد شد');
        return redirect()->route('country.index');
    }

    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $country = Country::with('seo')->findOrFail($id);
        $seo = Seo::all();
        return view('admin.country.edit', compact('country', 'seo'));
    }

    public function update(CountryUpdate $request, $id)
    {
        $country = Country::findOrFail($id);

        $country->title = $request->input('title');
        $country->slug = $request->input('slug');
        $country->content = $request->input('content');
        if ($request->hasFile('featured_image')) {
            $image = $request->file('featured_image');
            $filenameWithExt = $image->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $image->getClientOriginalExtension();
            $fileNameToStore = $request->slug.'.'.$extension;
            $location = public_path('img/country/' . $fileNameToStore);
            Image::make($image)->resize(250, null, function ($constraint) {$constraint->aspectRatio();})->save($location);
            $oldFilename = $country->image;
            $country->image = $fileNameToStore;

            Storage::delete('img/country/' . $oldFilename);
        }

        $country->save();

        if ($country->seo){
            $seo = $country->seo()->first();
            $seo->metadesc = $request->input('metadesc');
            $seo->keywords = $request->input('keywords');
            $country->seo()->save($seo);
        } else if ($request->metadesc || $request->keywords){
            $seo = new Seo;
            $seo->metadesc = $request->metadesc;
            $seo->keywords = $request->keywords;
            $country->seo()->save($seo);
        }
        Session::flash('success', 'کشور سازنده ویرایش شد');
        return redirect()->route('country.index');
    }

    public function destroy($id)
    {
        $country = Country::find($id);
        File::delete('img/country/' .$country->image);
        $products = Product::where('country_id',$brand->id)->update(['country_id' => NULL]);
        $country->delete();
        $country->seo()->delete();
        
        Session::flash('success', 'کشور سازنده حذف شد');
        return redirect()->route('country.index');
    }
}
