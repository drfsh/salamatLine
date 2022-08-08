<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Inventory;
use App\Models\Product;
use App\Filters\InventoryFilter;
use Log;
use App\Models\Order;
use DB;

class InventoryController extends Controller
{
    public function __construct() {
        $this->middleware(['auth', 'isAdmin']);
    }

    public function index()
    {
        // $orders = Order::where('invoice_id', 6)->get();
        // $orders = Order::all();
        // foreach ($orders as $item) {
        //     if(isset($item->detail)){
        //         $mp = $item->detail->price_id;
        //         $mf = $item->detail->feature_id;
        //     }else{
        //         $mp = null;
        //         $mf = null;
        //     }

        //     $inventory = Inventory::where('product_id',$item->product_id)->where('price_id',$mp)->where('feature_id',$mf)->first();
        //     if($inventory){
        //     $available = $inventory->qty - $item->qty;
        //         if($available <= 0){
        //             $inventory->qty = 0;
        //         }else{
        //             $inventory->qty = $available;
        //         }
        //     $inventory->save();
        //     }
        // }
        return view('admin.inventory.index');

    }

    public function add(Request $request)
    {
        $inventory = Inventory::where('product_id',$request->product_id)->where('price_id',$request->price_id)->where('feature_id',$request->feature_id)->first();

        if ($inventory) {
             return response()->json(['alert' => 'این محصول با اطلاعات نظیر آن قبلا در انبار وارد شده است، لطفا فقط آن را بروزرسانی نمایید.']);
        }

        $inventory = new Inventory;
        $inventory->product_id = $request->product_id;
        $inventory->price_id = $request->price_id;
        $inventory->feature_id = $request->feature_id;
        $inventory->qty = $request->qty;
        $inventory->save();
        return response()->json(['success' => 'با موفقیت ایجاد شد.']);
    }

    public function all(InventoryFilter $filters)
    {
        $inventory = Inventory::with('product', 'multiprice', 'multifeature')->latest()->filter($filters);
        return $inventory;
    }

    public function update(Request $request,$id)
    {
        $in = Inventory::find($id);
        $in->qty = $request->qty;
        $in->save();
        return response()->json(['success' => 'موجودی بروز شد']); 
    }

    public function delete($id)
    {
        $inventory = Inventory::find($id);
        $inventory->delete();
        return response()->json(['success' => 'موجودی حذف شد']);    
    }

}
