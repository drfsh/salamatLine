<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Material;
use App\Http\Requests\MaterialCreate;
use App\Http\Requests\MaterialUpdate;
use App\Models\Seo;
use Session;

class MaterialController extends Controller
{
    public function __construct() {
        $this->middleware(['auth', 'isAdmin']);
    }

     public function index()
    {
        $materials = Material::latest()->paginate(5); 
        return view('admin.material.index', compact('materials'));
    }

    public function create()
    {
        return view('admin.material.create');
    }

    public function store(MaterialCreate $request)
    {
        $material = new Material;
        $material->title = $request->title;
        $material->slug = $request->slug;
        $material->content = $request->content;

        $material->save();

        if ($request->metadesc || $request->keywords){
            $seo = new Seo;
            $seo->metadesc = $request->metadesc;
            $seo->keywords = $request->keywords;
            $material->seo()->save($seo);
        }

        Session::flash('success', 'جنس ایجاد شد');
        return redirect()->route('material.index');
    }

    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $material = Material::findOrFail($id);
        $seo = Seo::all();
        return view('admin.material.edit', compact('material', 'seo'));
    }

    public function update(MaterialUpdate $request, $id)
    {
        $material = Material::findOrFail($id);

        $material->title = $request->input('title');
        $material->slug = $request->input('slug');
        $material->content = $request->input('content');

        $material->save();

        if ($material->seo){
            $seo = $material->seo()->first();
            $seo->metadesc = $request->input('metadesc');
            $seo->keywords = $request->input('keywords');
            $material->seo()->save($seo);
        } else if ($request->metadesc || $request->keywords){
            $seo = new Seo;
            $seo->metadesc = $request->metadesc;
            $seo->keywords = $request->keywords;
            $material->seo()->save($seo);
        }
        Session::flash('success', 'جنس ویرایش شد');
        return redirect()->route('material.index');
    }

    public function destroy($id)
    {
        $material = Material::find($id);
        $material->delete();
        $material->seo()->delete();
        
        Session::flash('success', 'جنس حذف شد');
        return redirect()->route('material.index');
    }
}
