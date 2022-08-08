<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Company;
use App\Http\Requests\CompanyCreate;
use App\Http\Requests\CompanyUpdate;
use App\Models\Brand;
use App\Models\Seo;
use Session;
use Image;
use Storage;
use File;

class CompanyController extends Controller
{
    public function __construct() {
        $this->middleware(['auth', 'isAdmin']);
    }

    public function index()
    {
        $companies = Company::with('feature')->latest()->paginate(25); 
        return view('admin.company.index', compact('companies'));
    }

    public function create()
    {
        $brands = Brand::all();
        return view('admin.company.create', compact('brands'));
    }

    public function store(CompanyCreate $request)
    {
        $company = new Company;
        $company->title = $request->title;
        $company->slug = $request->slug;
        $company->content = $request->content;

        if ($request->hasFile('featured_image')) {
            $image = $request->file('featured_image');
            $filenameWithExt = $image->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $image->getClientOriginalExtension();
            $fileNameToStore = $request->title.'_'.time().'.'.$extension;
            $location = public_path('img/company/' . $fileNameToStore);
            $location2 = public_path('img/company/tiny/' . $fileNameToStore);
            Image::make($image)->fit(768,640)->save($location);
            Image::make($image)->fit(384,320)->save($location2);
            $company->image = $fileNameToStore;
        }

        $company->save();

        $company->brands()->sync($request->brands, false);

        if ($request->metadesc || $request->keywords){
            $seo = new Seo;
            $seo->metadesc = $request->metadesc;
            $seo->keywords = $request->keywords;
            $company->seo()->save($seo);
        }

        Session::flash('success', 'شرکت ایجاد شد');
        return redirect()->route('company.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $company = Company::find($id);
        $selectedBrands = $company->brands->pluck('id')->toArray();
        $brands = Brand::select('id','title')->get();
        return view('admin.company..edit', compact('company', 'brands', 'selectedBrands'));
    }

    public function update(CompanyUpdate $request, $id)
    {
        $company = Company::find($id);
        $company->title = $request->input('title');
        $company->slug = $request->input('slug');
        $company->content = $request->input('content');

        if ($request->hasFile('featured_image')) {
            $image = $request->file('featured_image');
            $filenameWithExt = $image->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $image->getClientOriginalExtension();
            $fileNameToStore = $request->title.'_'.time().'.'.$extension;
            $location = public_path('img/company/' . $fileNameToStore);
            $location2 = public_path('img/company/tiny/' . $fileNameToStore);
            Image::make($image)->fit(768,640)->save($location);
            Image::make($image)->fit(384,320)->save($location2);
            $oldFilename = $company->image;
            $company->image = $fileNameToStore;

            Storage::delete('img/company/' . $oldFilename);
            Storage::delete('img/company/tiny/' . $oldFilename);
        }

        $company->save();

        if (isset($request->brands)) {
            $company->brands()->sync($request->brands);
        } else {
            $company->brands()->sync(array());
        }

        if ($company->seo){
            $seo = $company->seo()->first();
            $seo->metadesc = $request->input('metadesc');
            $seo->keywords = $request->input('keywords');
            $company->seo()->save($seo);
        } else if ($request->metadesc || $request->keywords){
            $seo = new Seo;
            $seo->metadesc = $request->metadesc;
            $seo->keywords = $request->keywords;
            $company->seo()->save($seo);
        }

        Session::flash('success', 'شرکت ویرایش شد');
        return redirect()->route('company.index');

    }

    public function destroy($id)
    {
        $company = Company::find($id);
        File::delete('img/company/' .$company->image);
        File::delete('img/company/tiny/' .$company->image);
        $company->delete();
        $company->seo()->delete();
        
        Session::flash('success', 'شرکت حذف شد');
        return redirect()->route('company.index');
    }
}
