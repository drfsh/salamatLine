<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
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
    public function __construct()
    {
        $this->middleware(['auth', 'isAdmin']);
    }

    public function index()
    {
        $collections = Collection::orderBy('id', 'desc')->paginate(15);
        return view('admin.collection.index', compact('collections'));
    }

    public function create()
    {
        return view('admin.collection.create');
    }

    public function store(Request $request)
    {
        $data = ['true' => true];
        $banners = json_decode($request->banners);

        $products = [];
        $products[] = json_decode($request->product1);
        $products[] = json_decode($request->product2);
        $products[] = json_decode($request->product3);


        $collection = new Collection;
        $collection->title = $request->title;
        $collection->slug = $request->slug;
        $collection->sort_order = $request->sort_order;

        if ($request->active) {
            $collection->active = 1;
        } else {
            $collection->active = 0;
        }

        foreach ($banners as $k => $line) {
            $items = $line->items;
            foreach ($items as $z => $item) {
                $i = $k.'_'.$z;
                if ($request->hasFile($i)) {
                    $image = $request->file($i);
                    $filenameWithExt = $image->getClientOriginalName();
                    $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                    $extension = $image->getClientOriginalExtension();
                    $fileNameToStore = rand(1, 9999) . '_' . $i . '_' . time() . '.' . $extension;
                    $location = public_path('img/landing/' . $fileNameToStore);

                    Image::make($image)->save($location);
                    $item->imgPath = '/img/landing/'.$fileNameToStore;
                }

            }
        }

        $collection->products = json_encode($products);

        $collection->banners = json_encode($banners);

        $collection->save();
//        $collection->products()->sync($request->products, false);

        if ($request->metadesc || $request->keywords) {
            $seo = new Seo;
            $seo->metadesc = $request->metadesc;
            $seo->keywords = $request->keywords;
            $collection->seo()->save($seo);
        }
        return response()->json($data);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $collection = Collection::with('seo')->findOrFail($id);
        return view('admin.collection.edit', compact('collection'));
    }

    public function update(Request $request, $id)
    {

        $data = ['true' => true];
        $collection = Collection::findOrFail($id);

        $banners = json_decode($request->banners);

        $products = [];
        $products[] = json_decode($request->product1);
        $products[] = json_decode($request->product2);
        $products[] = json_decode($request->product3);

        $collection->title = $request->title;
        $collection->slug = $request->slug;
        $collection->sort_order = $request->sort_order;

        if ($request->active == 'true') {
            $collection->active = 1;
        } else {
            $collection->active = 0;
        }

        foreach ($banners as $k => $line) {
            $items = $line->items;
            foreach ($items as $z => $item) {
                $i = $k.'_'.$z;
                if ($request->hasFile($i)) {
                    $image = $request->file($i);
                    $filenameWithExt = $image->getClientOriginalName();
                    $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                    $extension = $image->getClientOriginalExtension();
                    $fileNameToStore = rand(1, 9999) . '_' . $i . '_' . time() . '.' . $extension;
                    $location = public_path('img/landing/' . $fileNameToStore);

                    Image::make($image)->save($location);
                    $item->imgPath = '/img/landing/'.$fileNameToStore;
                }

            }
        }


        $collection->products = json_encode($products);

        $collection->banners = json_encode($banners);

        $collection->save();

        // $collection->products()->sync($products[],false);

        if ($collection->seo) {
            $seo = $collection->seo()->first();
            $seo->metadesc = $request->input('metadesc');
            $seo->keywords = $request->input('keywords');
            $collection->seo()->save($seo);
        } else if ($request->metadesc || $request->keywords) {
            $seo = new Seo;
            $seo->metadesc = $request->metadesc;
            $seo->keywords = $request->keywords;
            $collection->seo()->save($seo);
        }


        return response()->json($data);

    }

    public function destroy($id)
    {
        $collection = Collection::find($id);
        $collection->delete();
        $collection->seo()->delete();
        Session::flash('success', 'مجموعه حذف شد');
        return redirect()->route('collection.index');
    }

    public function getLanding($id)
    {
        $page = Collection::find($id);
        if (is_null($page)) return response()->json(['true' => false]);


        if ($page->seo) {
            $seo = $page->seo()->first();
            $page['metadesc'] = $seo->metadesc;
            $page['keywords'] = $seo->keywords;
        }


        return response()->json(['true' => true, 'data' => $page]);
    }
}
