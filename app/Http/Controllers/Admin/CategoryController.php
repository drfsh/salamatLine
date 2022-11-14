<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryCreate;
use App\Http\Requests\CategoryUpdate;
use App\Models\Category;
use Session;
use Image;
use Storage;
use File;
class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'isAdmin']);
    }

    public function index()
    {
        $categories = Category::defaultOrder()->get()->toTree();

        // return $categories;
        return view('admin.categories.category.index', compact('categories'));
    }

    public function create()
    {
        $list = Category::get()->toFlatTree();
        return view('admin.categories.category.create', compact('list'));
    }

    public function store(Request $request)
    {
        $parent_id = $request->input('parent_id');
        $attributes = [
            'name' => $request->input('name'),
            'slug' => $request->input('slug'),
            'description' => $request->input('description')
        ];
        $category = Category::create($attributes);

        if ($parent_id) {
            $parent = Category::find($parent_id);
            $category->appendToNode($parent)->save();
        } else {
            $category->makeRoot()->save();
        }

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filenameWithExt = $image->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $image->getClientOriginalExtension();
            $fileNameToStore = $request->title . '_' . time() . '.' . $extension;
            $location = public_path('img/category/' . $fileNameToStore);
            $location2 = public_path('img/category/tiny/' . $fileNameToStore);
            Image::make($image)->fit(768, 640)->save($location);
            Image::make($image)->fit(384, 320)->save($location2);
            $category->img = $fileNameToStore;
            $category->save();
        }

        Session::flash('success', 'دسته‌بندی ایجاد شد');
        return redirect()->route('category.index');
    }


    public function edit($id)
    {
        $category = Category::find($id);
        $list = Category::get()->toFlatTree();
        return view('admin.categories.category.edit', compact('category', 'list'));
    }

    public function update(Request $request, $id)
    {

        $parent_id = $request->input('parent_id');

        $category = Category::find($id);
        $attributes = [
            'name' => $request->input('name'),
            'slug' => $request->input('slug'),
            'description' => $request->input('description')
        ];

        if ($parent_id) {
            $parent = Category::find($parent_id);
            $category->appendToNode($parent)->save();
        } else {
            $category->makeRoot()->save();
        }

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filenameWithExt = $image->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $image->getClientOriginalExtension();
            $fileNameToStore = $request->title . '_' . time() . '.' . $extension;
            $location = public_path('img/category/' . $fileNameToStore);
            $location2 = public_path('img/category/tiny/' . $fileNameToStore);
            Image::make($image)->fit(768, 640)->save($location);
            Image::make($image)->fit(384, 320)->save($location2);
            $oldFilename = $category->img;
            if ($oldFilename){
                Storage::delete('img/product/' . $oldFilename);
                Storage::delete('img/product/tiny/' . $oldFilename);
            }
            $category->img = $fileNameToStore;
            $category->save();
        }

        $category->update($attributes);
        Session::flash('success', 'دسته‌بندی ویرایش شد');
        return redirect()->route('category.index');
    }

    public function destroy($id)
    {
        Category::where('id', '=', $id)->delete();
        Session::flash('success', 'دسته‌بندی حذف شد');
        return 'ok';
    }


    public function up($id)
    {
        $category = Category::find($id);
        $bool = $category->up();
        return 'ok';
    }


    public function down($id)
    {
        $category = Category::find($id);
        $bool = $category->down();
        return 'ok';

    }


    public function hide_show($id)
    {
        $category = Category::find($id);
        $status = !$category->hide;
        $category->hide = $status;
//        $category2 = $category->children;
//        foreach ($category2 as $item2) {
//            $item2->hide = $status;
//            $item2->save();
//            $category3 = $item2->children;
//            foreach ($category3 as $item3) {
//                $item3->hide = $status;
//                $item3->save();
//            }
//        }
        $category->save();
        return 'ok';
    }

    public function hide_price($id)
    {
        $products =
            Product::published()
                ->withAnyCategories($id)->get();

        foreach ($products as $value) {
            $value->price_hide = true;
            $value->save();
        }

        return 'ok';
    }

    public function show_price($id)
    {
        $products =
            Product::published()
                ->withAnyCategories($id)->get();

        foreach ($products as $value) {
            $value->price_hide = false;
            $value->save();
        }

        return 'ok';
    }

    public function getApi(Request $request)
    {
        $parent_id = $request->parent_id;
        if ($parent_id == null) {
            $cat = Category::where('parent_id', null)->defaultOrder()->get();
        } else {
            $cat = Category::where('parent_id', $parent_id)->defaultOrder()->get();
        }

        return response()->json($cat);
    }

}
