<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Discount;
use App\Models\Product;
use App\Models\Multiprice;
use App\Models\Multifeature;
use Session;

class DiscountController extends Controller
{
    public function __construct() {
        $this->middleware(['auth', 'isAdmin']);
    }

    public function index()
    {
        $discounts = Discount::withTrashed()->orderBy('id', 'desc')->with('product','multiprice','multifeature')->paginate(15);
        // return $discounts;
        return view('admin.discount.index', compact('discounts'));
    }

    public function create()
    {
        $product = Product::all();
        $features = Multifeature::all();
        $prices = Multiprice::all();
        return view('admin.discount.create', compact('product', 'features', 'prices'));
    }

    public function store(Request $request)
    {


        $discount = new Discount;
        $discount->title = $request->title;
        $discount->content = $request->content;
        $discount->price = $request->price;
        $discount->max_uses = $request->max_uses;
        $discount->product_id = $request->product_id;
        $discount->feature_id = $request->feature_id;
        $discount->price_id = $request->price_id;
        $discount->start_date = $request->start_date;
        $discount->end_date = $request->end_date;
        $discount->uses = 0;
        if ($request->is_fixed) {
            $discount->is_fixed = 1;
        }else{
            $discount->is_fixed = 0;
        }
        if ($request->active) {
            $discount->active = 1;
        }else{
            $discount->active = 0;
        }
        $discount->save();
        return response()->json(['success' => 'با موفقیت ایجاد شد.']);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $discount = Discount::find($id);
        return view('admin.discount.edit', compact('discount'));
    }

    public function update(Request $request, $id)
    {
        $discount = Discount::find($id);
        $discount->title = $request->input('title');
        $discount->content = $request->input('content');
        $discount->price = $request->input('price');
        $discount->max_uses = $request->input('max_uses');
        $discount->product_id = $request->input('product_id');
        $discount->feature_id = $request->input('feature_id');
        $discount->price_id = $request->input('price_id');
        $discount->start_date = $request->input('start_date');
        $discount->end_date = $request->input('end_date');
        if ($request->active) {
            $discount->active = 1;
        }else{
            $discount->active = 0;
        }

        $discount->save();
        return response()->json(['success' => 'با موفقیت ویرایش شد.']);
    }

    public function destroy($id)
    {
        $discount = Discount::find($id);
        $discount->active = 0;
        $discount->save();
        $discount->delete();

        Session::flash('success', 'تخفیف حذف شد');
        return redirect()->route('discount.index');
    }
}
