<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Collection;
use App\Models\Product;
use App\Models\Seo;
use Session;
use Image;
use Storage;
use File;

class CollectionController extends Controller
{
    public function __construct() {
        $this->middleware(['auth', 'isAdmin']);
    }

    public function index()
    {
        $collections = Collection::orderBy('id', 'desc')->paginate(15);
        return view('admin.collection.index',compact('collections'));
    }

    public function create()
    {
        $products = product::all();
        return view('admin.collection.create', compact('products'));
    }

    public function store(Request $request)
    {
        $collection = new Collection;
        $collection->title = $request->title;
        $collection->slug = $request->slug;
        $collection->sort_order = $request->sort_order;
        $collection->content = $request->content;
        if ($request->featured) {
            $collection->featured = 1;
        }else{
            $collection->featured = 0;
        }
        if ($request->active) {
            $collection->active = 1;
        }else{
            $collection->active = 0;
        }

        if ($request->hasFile('featured_image')) {
            $image = $request->file('featured_image');
            $filenameWithExt = $image->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $image->getClientOriginalExtension();
            $fileNameToStore = rand( 1 , 9999).'_'.time().'.'.$extension;
            $location = public_path('img/collection/' . $fileNameToStore);
            Image::make($image)->fit(1920, 800)->save($location);
            $collection->image = $fileNameToStore;
        }

        $collection->save();
        $collection->products()->sync($request->products, false);

        if ($request->metadesc || $request->keywords){
            $seo = new Seo;
            $seo->metadesc = $request->metadesc;
            $seo->keywords = $request->keywords;
            $collection->seo()->save($seo);
        }

        Session::flash('success', 'مجموعه ایجاد شد');
        return redirect()->route('collection.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $collection = Collection::with('seo')->findOrFail($id);
        $products = Product::all();
        $product = $collection->products->pluck('id')->toArray();
        return view('admin.collection.edit', compact('collection', 'products', 'product'));
    }

    public function update(Request $request, $id)
    {
        $collection = Collection::findOrFail($id);
        $collection->title = $request->input('title');
        $collection->slug = $request->input('slug');
        $collection->content = $request->input('content');
        $collection->sort_order = $request->input('sort_order');

        if ($request->active) {
            $collection->active = 1;
        }else{
            $collection->active = 0;
        }
        if ($request->featured) {
            $collection->featured = 1;
        }else{
            $collection->featured = 0;
        }
        if ($request->hasFile('featured_image')) {
            $image = $request->file('featured_image');
            $filenameWithExt = $image->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $image->getClientOriginalExtension();
            $fileNameToStore = $request->title.'_'.time().'.'.$extension;
            $location = public_path('img/collection/' . $fileNameToStore);
            Image::make($image)->fit(1920, 1080)->save($location);
            $oldFilename = $collection->image;
            $collection->image = $fileNameToStore;

            Storage::delete('img/collection/' . $oldFilename);
        }

        $collection->save();
        if (isset($request->products)) {
            $collection->products()->sync($request->products);
        } else {
            $post->products()->sync(array());
        }
        // $collection->products()->sync($products[],false);

        if ($collection->seo){
            $seo = $collection->seo()->first();
            $seo->metadesc = $request->input('metadesc');
            $seo->keywords = $request->input('keywords');
            $collection->seo()->save($seo);
        } else if ($request->metadesc || $request->keywords){
            $seo = new Seo;
            $seo->metadesc = $request->metadesc;
            $seo->keywords = $request->keywords;
            $collection->seo()->save($seo);
        }
        Session::flash('success', 'مجموعه ویرایش شد');
        return redirect()->route('collection.index');

    }

    public function destroy($id)
    {
        $collection = Collection::find($id);
        $collection->delete();
        $collection->seo()->delete();
        Session::flash('success', 'مجموعه حذف شد');
        return redirect()->route('collection.index');
    }
}
