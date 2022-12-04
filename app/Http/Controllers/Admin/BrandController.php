<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Product;
use App\Http\Requests\BrandCreate;
use App\Http\Requests\BrandUpdate;
use App\Filters\BrandFilter;
use App\Models\Seo;
use Session;
use Image;
use Storage;
use File;

class BrandController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'isAdmin']);
    }

    public function index()
    {
        return view('admin.brand.index');
    }

    public function create()
    {
        return view('admin.brand.create');
    }

    public function store(BrandCreate $request)
    {
        $brand = new Brand;
        $brand->title = $request->title;
        $brand->slug = $request->slug;
        $brand->content = $request->content;
        if ($request->hasFile('featured_image')) {
            $image = $request->file('featured_image');
            $filenameWithExt = $image->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $image->getClientOriginalExtension();
            $fileNameToStore = $request->title . '_' . time() . '.' . $extension;
            $location = public_path('img/brand/' . $fileNameToStore);
            $location2 = public_path('img/brand/tiny/' . $fileNameToStore);
            Image::make($image)->fit(640, 640)->save($location);
            Image::make($image)->fit(300, 300)->save($location2);
            $brand->image = $fileNameToStore;
        }
        $brand->save();

        if ($request->metadesc || $request->keywords) {
            $seo = new Seo;
            $seo->metadesc = $request->metadesc;
            $seo->keywords = $request->keywords;
            $brand->seo()->save($seo);
        }

        Session::flash('success', 'برند ایجاد شد');
        return redirect()->route('brand.index');
    }


    public function edit($id)
    {
        $brand = Brand::findOrFail($id);
        $seo = Seo::all();
        return view('admin.brand.edit', compact('brand', 'seo'));
    }

    public function update(BrandUpdate $request, $id)
    {
        $brand = Brand::findOrFail($id);

        $brand->title = $request->input('title');
        $brand->slug = $request->input('slug');
        $brand->content = $request->input('content');
        if ($request->hasFile('featured_image')) {
            $image = $request->file('featured_image');
            $filenameWithExt = $image->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $image->getClientOriginalExtension();
            $fileNameToStore = $request->title . '_' . time() . '.' . $extension;
            $location = public_path('img/brand/' . $fileNameToStore);
            $location2 = public_path('img/brand/tiny/' . $fileNameToStore);
            Image::make($image)->fit(640, 640)->save($location);
            Image::make($image)->fit(300, 300)->save($location2);
            $oldFilename = $brand->image;
            $brand->image = $fileNameToStore;

            Storage::delete('img/brand/' . $oldFilename);
            Storage::delete('img/brand/tiny/' . $oldFilename);
        }

        $brand->save();

        if ($brand->seo) {
            $seo = $brand->seo()->first();
            $seo->metadesc = $request->input('metadesc');
            $seo->keywords = $request->input('keywords');
            $brand->seo()->save($seo);
        } else if ($request->metadesc || $request->keywords) {
            $seo = new Seo;
            $seo->metadesc = $request->metadesc;
            $seo->keywords = $request->keywords;
            $brand->seo()->save($seo);
        }
        Session::flash('success', 'برند ویرایش شد');
        return redirect()->route('brand.index');
    }

    public function destroy($id)
    {
        $brand = Brand::find($id);
        File::delete('img/brand/' . $brand->image);
        File::delete('img/brand/tiny/' . $brand->image);
        $products = Product::where('brand_id', $brand->id)->update(['brand_id' => NULL]);
        $brand->delete();
        $brand->seo()->delete();

        Session::flash('success', 'برند حذف شد');
        return redirect()->route('brand.index');
    }

    public function api(BrandFilter $filters)
    {
        $brands = Brand::withCount('product')->latest()->filter($filters);
        return $brands;
    }

    public function productStatus(Request $request)
    {
        $id = $request->id;
        $product = Brand::find($id)->product;
        if ($request->type == null) {
            $type = 0;
        } else {
            $type = $request->type;
        }
        foreach ($product as $p) {
            $p->active = $type;
            $p->save();
        }

    }


    public function hide_price($id)
    {
        $products = Product::published()->where('brand_id', $id)->get();

        foreach ($products as $value) {
            $value->price_hide = true;
            $value->save();
        }

        return redirect()->route('brand.index');
    }

    public function show_price($id)
    {
        $products = Product::published()->where('brand_id', $id)->get();

        foreach ($products as $value) {
            $value->price_hide = false;
            $value->save();
        }

        return redirect()->route('brand.index');
    }

    public function showhide($id)
    {
        $brand = Brand::find($id);

        $brand->hide = !$brand->hide;
        $brand->save();
        return redirect()->route('brand.index');
    }

    public function changePrice(Request $request)
    {
        $p = (int) $request->p;
        $brand = Brand::find($request->id);

        $products = $brand->product;
        foreach ($products as $v) {
            $price = $v->price;
            $price = ($price*$p)/100;
            $v->price = $v->price+$price;
            $v->save();
        }

        return response()->json(['true'=>true]);
    }

}
