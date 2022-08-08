<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\Seo;
use Session;
use Image;
use Storage;
use File;

class PageController extends Controller
{
    public function __construct() {
        $this->middleware(['auth', 'isAdmin']);
    }

    public function index()
    {
        $pages = Page::orderBy('id', 'desc')->paginate(15);
        return view('admin.page.index',compact('pages'));
    }

    public function create()
    {
        return view('admin.page.create');
    }

    public function store(Request $request)
    {
        $page = new Page;
        $page->title = $request->title;
        $page->slug = $request->slug;
        $page->content = $request->content;

        if ($request->active) {
            $page->active = 1;
        }else{
            $page->active = 0;
        }

        if ($request->hasFile('featured_image')) {
            $image = $request->file('featured_image');
            $filenameWithExt = $image->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $image->getClientOriginalExtension();
            $fileNameToStore = $request->title.'_'.time().'.'.$extension;
            $location = public_path('img/page/' . $fileNameToStore);
            Image::make($image)->fit(1920, 1080)->save($location);
            $page->image = $fileNameToStore;
        }

        $page->save();

        if ($request->metadesc || $request->keywords){
            $seo = new Seo;
            $seo->metadesc = $request->metadesc;
            $seo->keywords = $request->keywords;
            $page->seo()->save($seo);
        }

        // return $page;
        Session::flash('success', 'صفحه ایجاد شد');
        return redirect()->route('page.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $page = Page::with('seo')->findOrFail($id);
        $seo = Seo::all();
        return view('admin.page.edit', compact('page', 'seo'));

    }


    public function update(Request $request, $id)
    {
        $page = Page::findOrFail($id);
        $page->title = $request->input('title');
        $page->slug = $request->input('slug');
        $page->content = $request->input('content');

        if ($request->active) {
            $page->active = 1;
        }else{
            $page->active = 0;
        }

        if ($request->hasFile('featured_image')) {
            $image = $request->file('featured_image');
            $filenameWithExt = $image->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $image->getClientOriginalExtension();
            $fileNameToStore = $request->title.'_'.time().'.'.$extension;
            $location = public_path('img/page/' . $fileNameToStore);
            Image::make($image)->fit(1920, 1080)->save($location);
            $oldFilename = $page->image;
            $page->image = $fileNameToStore;

            Storage::delete('img/page/' . $oldFilename);
        }

        $page->save();

        if ($page->seo){
            $seo = $page->seo()->first();
            $seo->metadesc = $request->input('metadesc');
            $seo->keywords = $request->input('keywords');
            $page->seo()->save($seo);
        } else if ($request->metadesc || $request->keywords){
            $seo = new Seo;
            $seo->metadesc = $request->metadesc;
            $seo->keywords = $request->keywords;
            $page->seo()->save($seo);
        }

        Session::flash('success', 'صفحه ویرایش شد');
        return redirect()->route('page.index');
    }

    public function destroy($id)
    {
        $page = Page::find($id);
        $page->delete();
        $page->seo()->delete();
        Session::flash('success', 'صفحه حذف شد');
        return redirect()->route('page.index');
    }
}
