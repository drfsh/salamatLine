<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryCreate;
use App\Http\Requests\CategoryUpdate;
use App\Models\Category;
use Session;

class CategoryController extends Controller
{
    public function __construct() {
        $this->middleware(['auth', 'isAdmin']);
    }

    public function index()
    {
        $categories = Category::defaultOrder()->get()->toTree();

        // return $categories;
        return view('admin.categories.category.index',compact('categories'));
    }

    public function create()
    {
        $list = Category::get()->toFlatTree();
        return view('admin.categories.category.create',compact('list'));
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
            $parent =Category::find($parent_id);
            $category->appendToNode($parent)->save();
        }else{
            $category->makeRoot()->save();
        }



        Session::flash('success', 'دسته‌بندی ایجاد شد');
        return redirect()->route('category.index');
    }


    public function edit($id)
    {
        $category = Category::find($id);
        $list = Category::get()->toFlatTree();
        return view('admin.categories.category.edit', compact('category','list'));
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
         }else{
            $category->makeRoot()->save();
         }

        $category->update($attributes);
        Session::flash('success', 'دسته‌بندی ویرایش شد');
        return redirect()->route('category.index');
    }

    public function destroy($id)
    {
        Category::where('id', '=', $id)->delete();
        Session::flash('success', 'دسته‌بندی حذف شد');
        return redirect()->route('category.index');
    }


    public function up($id)
    {
        $category = Category::find($id);
        $bool = $category->up();
        return redirect()->route('category.index');
    }


    public function down($id)
    {
        $category = Category::find($id);
        $bool = $category->down();
        return redirect()->route('category.index');
    }


    public function hide_show($id)
    {
        $category = Category::find($id);
        $category->hide = !$category->hide;
        $category->save();
        return redirect()->route('category.index');
    }

    public function hide_price($id)
    {
        $products =
            Product::published()
                ->withAnyCategories($id)->get();

        foreach ($products as $value){
            $value->price_hide = true;
            $value->save();
        }

        return redirect()->route('category.index');
    }

    public function show_price($id)
    {
        $products =
            Product::published()
                ->withAnyCategories($id)->get();

        foreach ($products as $value){
            $value->price_hide = false;
            $value->save();
        }

        return redirect()->route('category.index');
    }


}
