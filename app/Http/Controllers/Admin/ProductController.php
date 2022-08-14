<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Country;
use App\Models\Feature;
use App\Models\Material;
use App\Models\Company;
use App\Models\ProductPhoto;
use App\Models\Multiprice;
use App\Models\Multifeature;
use App\Models\Category;
use App\Models\Inventory;
use App\Http\Requests\ProductCreate;
use App\Http\Requests\ProductUpdate;
use App\Traits\NotiStock;
use App\Models\Seo;
use Session;
use Image;
use Storage;
use File;
use Log;

class ProductController extends Controller
{

    use NotiStock;


    public function __construct() {
        $this->middleware(['auth', 'isAdmin']);
    }

    public function index()
    {
        $data['product_count'] = Product::count();
        $data['product_publish_count'] = Product::published()->count();
        $data['category_count'] = Category::count();
        $data['brand_count'] = Brand::count();
        $data['company_count'] = Company::count();
        $data['material_count'] = Material::count();
        $data['country_count'] = Country::count();
        // return $data;
        return view('admin.product.index',compact('data'));
    }

    public function create()
    {
        $brand = Brand::all();
        $country = Country::all();
        $material = Material::all();
        $company = Company::all();
        $allcategories = app('rinvex.categories.category')->get()->toFlatTree();
        return view('admin.product.create', compact('brand', 'country', 'material', 'company', 'allcategories'));
    }

    public function store(ProductCreate $request)
    {
        $product = new Product;
        $product->title = $request->title;
        $product->subtitle = $request->subtitle;
        $product->slug = $request->slug;
        if($request->price == 0){
            $product->price =  Null;
        }else{
            $product->price = (float) str_replace(',', '', $request->price);
        }

        if($request->price_usd == 0){
            $product->price_usd =  Null;
        }else{
            $product->price_usd = (float) str_replace(',', '', $request->price_usd);
        }

        if($request->price_AED == 0){
            $product->price_AED =  Null;
        }else{
            $product->price_AED = (float) str_replace(',', '', $request->price_AED);
        }

        if($request->value_added == 0){
            $product->value_added =  0;
        }else{
            $product->value_added = (float) str_replace(',', '', $request->value_added);
        }

        if ($request->brand_id == 'NULL') {
            $product->brand_id = null;
        }else{
            $product->brand_id = $request->brand_id;
        }
        if ($request->country_id == 'NULL') {
            $product->country_id = null;
        }else{
            $product->country_id = $request->country_id;
        }

        if ($request->featured) {
            $product->featured = 1;
        }else{
            $product->featured = 0;
        }
        if ($request->active) {
            $product->active = 1;
        }else{
            $product->active = 0;
        }

        if ($request->hasFile('featured_image')) {
            $image = $request->file('featured_image');
            $filenameWithExt = $image->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $image->getClientOriginalExtension();
            $fileNameToStore = $request->title.'_'.time().'.'.$extension;
            $location = public_path('img/product/' . $fileNameToStore);
            $location2 = public_path('img/product/tiny/' . $fileNameToStore);
            Image::make($image)->fit(768,640)->save($location);
            Image::make($image)->fit(384,320)->save($location2);
            $product->image = $fileNameToStore;
        }

        $product->save();
        $product->attachCategories($request->input('category_id'));

        if ($request->material_id == 'NULL') {
            $material = null;
        }else{
            $material = $request->material_id;
        }
        if ($request->company_id == 'NULL') {
            $company_id = null;
        }else{
            $company_id = $request->company_id;
        }
        Feature::create([
            'product_id' => $product->id,
            'material_id' => $material,
            'weight' => $request->weight,
            'numberin' => $request->numberin,
            'length' => $request->length,
            'width' => $request->width,
            'height' => $request->height,
            'diameter' => $request->diameter,
            'volume' => $request->volume,
            'purity' => $request->purity,
            'density' => $request->density,
            'company_id' => $company_id,
            'guarantee' => $request->guarantee,
            'warranty' => $request->warranty,
            'teamstar' => $request->teamstar,
            'expire_at' => $request->expire_at,
            'kind' => $request->kind,
            'mechanism' => $request->mechanism,
            'operation' => $request->operation,
            'transport' => $request->transport,
            'content' => $request->content,
            'days' => $request->days,
        ]);

        if ($request->hasFile('photos')){
            foreach ($request->photos as $photo) {
                $filenameWithExt = $photo->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $photo->getClientOriginalExtension();
                $fileNameToStore = time().'-'.rand(0, 9).'.'.$extension;
                $location = public_path('img/product/other/' . $fileNameToStore);
                $location2 = public_path('img/product/other/tiny/' . $fileNameToStore);
                Image::make($photo)->fit(768,640)->save($location);
                Image::make($photo)->fit(384,320)->save($location2);
                ProductPhoto::create([
                    'product_id' => $product->id,
                    'filename' => $fileNameToStore,
                ]);
            }
        }


        if($request->moreFields){
            foreach($request->moreFields as $moreField)
            {
                $multi = new Multiprice($moreField);
                $product->multiprice()->save($multi);
            }
        }

        if($request->moreFeatures){
            foreach($request->moreFeatures as $moreFeature)
            {
                $multifeature = new Multifeature($moreFeature);
                $product->multifeature()->save($multifeature);
            }
        }

        if ($request->metadesc || $request->keywords){
            $seo = new Seo;
            $seo->metadesc = $request->metadesc;
            $seo->keywords = $request->keywords;
            $product->seo()->save($seo);
        }

        // $product->notify(new \App\Notifications\ProductPublished());

        Session::flash('success', 'محصول ایجاد شد');
        return redirect()->route('product.index');
    }

    public function show(Product $product)
    {
        //
    }

    public function edit($id)
    {
        $product = Product::with('feature', 'brand', 'country', 'multiprice', 'seo')->findOrFail($id);
        $brand = Brand::all();
        $country = Country::all();
        $material = Material::all();
        $company = Company::all();
        $allcategories = app('rinvex.categories.category')->get()->toFlatTree();
        $category = $product->categories->pluck('id')->toArray();
        $seo = Seo::all();
        // return $product->multiprice;
        return view('admin.product.edit', compact('product', 'brand', 'country', 'material', 'company', 'allcategories', 'category', 'seo'));
    }

    public function update(ProductUpdate $request, $id)
    {
        $product = Product::findOrFail($id);

        if ($product->active == 0 && $request->active == 'on') {
            $this->NotiStock($product->id,$product->title,$product->slug);
        }


        $product->title = $request->input('title');
        $product->subtitle = $request->input('subtitle');
        $product->slug = $request->input('slug');
        if($request->price == 0){
            $product->price =  Null;
        }else{
            $product->price = (float) str_replace(',', '', $request->input('price'));
        }

        if($request->price_usd == 0){
            $product->price_usd =  Null;
        }else{
            $product->price_usd = (float) str_replace(',', '', $request->price_usd);
        }

        if($request->price_AED == 0){
            $product->price_AED =  Null;
        }else{
            $product->price_AED = (float) str_replace(',', '', $request->price_AED);
        }

        if($request->value_added == 0){
            $product->value_added =  0;
        }else{
            $product->value_added = (float) str_replace(',', '', $request->value_added);
        }

        if ($request->brand_id == 'NULL') {
            $product->brand_id = null;
        }else{
            $product->brand_id = $request->input('brand_id');
        }
        if ($request->country_id == 'NULL') {
            $product->country_id = null;
        }else{
            $product->country_id = $request->input('country_id');
        }

        $product->syncCategories($request->input('category_id'));

        if ($request->featured) {
            $product->featured = 1;
        }else{
            $product->featured = 0;
        }
        if ($request->active) {
            $product->active = 1;
        }else{
            $product->active = 0;
        }

        if ($request->hasFile('featured_image')) {
            $image = $request->file('featured_image');
            $filenameWithExt = $image->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $image->getClientOriginalExtension();
            $fileNameToStore = $request->title.'_'.time().'.'.$extension;
            $location = public_path('img/product/' . $fileNameToStore);
            $location2 = public_path('img/product/tiny/' . $fileNameToStore);
            Image::make($image)->fit(768,640)->save($location);
            Image::make($image)->fit(384,320)->save($location2);
            $oldFilename = $product->image;
            $product->image = $fileNameToStore;

            Storage::delete('img/product/' . $oldFilename);
            Storage::delete('img/product/tiny/' . $oldFilename);
        }


        $product->save();

        if ($request->input('material_id') == 'NULL') {
            $material = null;
        }else{
            $material = $request->input('material_id');
        }
        if ($request->input('company_id') == 'NULL') {
            $company = null;
        }else{
            $company = $request->input('company_id');
        }
        if($product->feature()->exists()){
            $feature = Feature::where('product_id', $product->id)->first();

            $feature->material_id = $material;
            $feature->weight = $request->input('weight');
            $feature->numberin = $request->input('numberin');
            $feature->length = $request->input('length');
            $feature->width = $request->input('width');
            $feature->height = $request->input('height');
            $feature->diameter = $request->input('diameter');
            $feature->volume = $request->input('volume');
            $feature->purity = $request->input('purity');
            $feature->density = $request->input('density');
            $feature->company_id = $company;
            $feature->guarantee = $request->input('guarantee');
            $feature->warranty = $request->input('warranty');
            $feature->teamstar = $request->input('teamstar');
            $feature->expire_at = $request->input('expire_at');
            $feature->kind = $request->input('kind');
            $feature->mechanism = $request->input('mechanism');
            $feature->operation = $request->input('operation');
            $feature->transport = $request->input('transport');
            $feature->content = $request->input('content');
            $feature->days = $request->input('days');
            $feature->save();
        }

        if ($request->hasFile('photos')){
            foreach ($request->photos as $photo) {
                $filenameWithExt = $photo->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $photo->getClientOriginalExtension();
                $fileNameToStore = time().'-'.rand(0, 9).'.'.$extension;
                $location = public_path('img/product/other/' . $fileNameToStore);
                $location2 = public_path('img/product/other/tiny/' . $fileNameToStore);
                Image::make($photo)->fit(768,640)->save($location);
                Image::make($photo)->fit(384,320)->save($location2);
                ProductPhoto::create([
                    'product_id' => $product->id,
                    'filename' => $fileNameToStore,
                ]);
            }
        }


        if($request->exs){
            foreach($request->exs as $item)
            {
                // Log::info($item['title']);
                $exmulti = Multiprice::find($item["id"]);
                $exmulti->title = $item["title"];
                $exmulti->price = $item["price"];
                $exmulti->save();
            }
        }

        if($request->fea){
            foreach($request->fea as $item)
            {
                $fmulti = Multifeature::find($item["id"]);
                $fmulti->title = $item["title"];
                $fmulti->save();
            }
        }


        if($request->moreFields){
            foreach($request->moreFields as $moreField)
            {
                $multi = new Multiprice($moreField);
                $product->multiprice()->save($multi);
            }
        }

        if($request->moreFeatures){
            foreach($request->moreFeatures as $moreFeature)
            {
                $multifeature = new Multifeature($moreFeature);
                $product->multifeature()->save($multifeature);
            }
        }


        if ($product->seo){
            $seo = $product->seo()->first();
            $seo->metadesc = $request->input('metadesc');
            $seo->keywords = $request->input('keywords');
            $product->seo()->save($seo);
        } else if ($request->metadesc || $request->keywords){
            $seo = new Seo;
            $seo->metadesc = $request->metadesc;
            $seo->keywords = $request->keywords;
            $product->seo()->save($seo);
        }


        Session::flash('success', 'محصول ویرایش شد');
        return redirect()->route('product.index');
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        $feature = Feature::where('product_id', $product->id)->first();
        if($product->image != NULL){
            File::move(public_path('img/product/' .$product->image), public_path('img/delete/product/' .$product->image));
            File::move(public_path('img/product/tiny/' .$product->image), public_path('img/delete/product/tiny/' .$product->image));
        }
        $product->delete();
        $feature->delete();
        $product->seo()->delete();

        return true;
    }

    public function DeleteImage($id)
    {
        $product = Product::findOrFail($id);
            File::delete('img/product/' .$product->image);
            File::delete('img/product/tiny/' .$product->image);
            $product->image = Null;
            $product->save();
            Session::flash('success', 'عکس اصلی با موفقیت حذف شد!');
            return redirect()->back()->withInput();
    }

    public function DeleteMulti($id)
    {
        $image = ProductPhoto::findOrFail($id);
        File::move(public_path('img/product/other/' .$image->filename), public_path('img/delete/product/other/' .$image->filename));
        File::move(public_path('img/product/other/tiny/' .$image->filename), public_path('img/delete/product/other/tiny/' .$image->filename));
        $image->delete();
        Session::flash('success', 'محتوای شما بروزرسانی شد');
        return redirect()->back()->withInput();
    }

    public function Priceupdate(Request $request, $id)
    {
        $multiprice = Multiprice::find($id);
        $multiprice->title = $request->input('title'.$id);
        $multiprice->price = $request->input('price'.$id);
        $multiprice->save();
        Session::flash('success', 'قیمت بروزرسانی شد');
        return redirect()->back()->withInput();
    }

    public function Pricedelete($id){
        $multi = Multiprice::findOrFail($id);
        $product = $multi->product_id;
        $inventory = Inventory::where('product_id', $product)->where('price_id', $id)->first();
        if($inventory) {
            Session::flash('alert', 'از این محصول با این قیمت در انبار موجود میباشد؛ لطفا قبل از حذف قیمت، موجودی انبار را حذف کنید');
            return redirect()->back();
        } else {
            $multi->delete();
            Session::flash('success', 'قیمت حذف شد');
            return redirect()->back();
        }
    }

    public function Featureupdate(Request $request, $id)
    {
        $multifeature = Multifeature::find($id);
        $multifeature->title = $request->input('item[title]');
        $multifeature->save();
        Session::flash('success', 'آیتم بروزرسانی شد');
        return redirect()->back()->withInput();
    }

    public function Featuredelete($id){
        $multi = Multifeature::findOrFail($id);
        $product = $multi->product_id;
        $inventory = Inventory::where('product_id', $product)->where('feature_id', $id)->first();
        if($inventory) {
            Session::flash('alert', 'از این محصول با این ویژگی در انبار موجود میباشد؛ لطفا قبل از حذف ویژگی، موجودی انبار را حذف کنید');
            return redirect()->back();
        } else {
            $multi->delete();
            Session::flash('success', 'آیتم حذف شد');
            return redirect()->back();
        }
    }


    public function InlineUpdate(Request $request, $id)
    {
        $p = Product::find($id);
        $p->title = $request->title;
        $p->subtitle = $request->subtitle;
        $p->price = $request->price;
        $p->save();
    }
    public function Active(Request $request, $id)
    {
        $situation = $request->active;
        $p = Product::find($id);


        if ($p->active == 0 && $situation == 1) {
            $this->NotiStock($id,$p->title,$p->slug);
        }

        $p->active = $situation;
        $p->save();


        return 'okey';
    }



}
