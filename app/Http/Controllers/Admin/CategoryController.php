<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category_relation;
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
        return view('admin.categories.category.index');
    }

    public function create(Request $request)
    {
        $parent_id = $request->parent_id; //parent show id
        $category = Category_relation::find($parent_id);
        if ($category)
            $category = $category->category_id;
        $list = Category::get();
        return view('admin.categories.category.create', compact('list','category','parent_id'));
    }

    public function store(Request $request)
    {
        $parent_id = $request->input('parent_id');
        if (!$parent_id || is_null($parent_id))
            $parent_id = 0;
        $name = ['fa'=>$request->input('name')];
        $description = ['fa'=>$request->input('description')];
        $attributes = [
            'name' => json_encode($name),
            'slug' => $request->input('slug'),
            'description' => json_encode($description)
        ];

        $sort = 0;
        if ($parent_id!=0){
            $show = Category_relation::where('parent_id',$parent_id)->defaultOrder()->first();
            if ($show)
                $sort = $show->sort+1;
        }
        $category = Category::create($attributes);
        Category_relation::create([
            'category_id'=>$category->id,
            'parent_id'=>$parent_id,
            'sort'=>$sort
        ]);

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
        $list = Category::get();
        return view('admin.categories.category.edit', compact('category', 'list'));
    }

    public function update(Request $request, $id)
    {

        $parent_id = $request->input('parent_id');

        $category = Category::find($id);

        $name = ['fa'=>$request->input('name')];
        $description = ['fa'=>$request->input('description')];
        $attributes = [
            'name' => json_encode($name),
            'slug' => $request->input('slug'),
            'description' => json_encode($description)
        ];

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

    public function destroy($child_id,$parent_id)
    {
        $rlation = Category_relation::find($child_id);
        if ($rlation)
        {
            $rlation->deleteAll();
        }
//        else
//            Category::where('id', '=', $child_id)->delete();

        Session::flash('success', 'دسته‌بندی حذف شد');
        return 'ok';
    }


    public function up($id)
    {
        $category = Category_relation::find($id);
        $bool = $category->up();
        return 'ok';
    }


    public function down($id)
    {
        $category = Category_relation::find($id);
        $bool = $category->down();
        return 'ok';

    }


    public function hide_show($id)
    {
        $category = Category_relation::find($id);
        $status = !$category->hide;
        $category->hide = $status;
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
            $cat = Category::getRoot();
        } else {
            $cat = Category::getRoot($parent_id);
        }

//        Category::withTrashed()->find(120)->restore();
        return response()->json($cat);
    }

    public function getTrash()
    {
        $parent_id = Category_relation::onlyTrashed()->get()->pluck('category');
        return response()->json($parent_id);
    }

    public function trashDelete($id){
        Category_relation::onlyTrashed()->find($id)->forceDelete();
    }

    public function trashRestore($id){
        Category_relation::onlyTrashed()->find($id)->restore();
    }

    public function copy(Request $request)
    {
        $child_id = $request->show_id; // is copy , id => category_relations
        $parent_id = $request->parent_id;// to copy,

        $graph = Category_relation::find($child_id);
        $graph->copy($parent_id);

        return true;
    }

    public function cat(Request $request)
    {
        $newParent_id = $request->new_parent_id;
        $oldParent_id = $request->old_parent_id;
        $child_id = $request->child_id;

        $catR = Category_relation::where([['child_id',$child_id],['parent_id',$oldParent_id]])->first();
        $catR->parent_cat = $newParent_id;
        $catR->save();
        return true;
    }

}
