<?php

namespace App\Http\Controllers\Admin\report;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;

class detail extends Controller
{
    public function index($slug){

        $situation = 'unpaid';
        $data['product'] = Product::where('slug', '=', $slug)->first();
        $data['detail'] = Order::where('product_id',$data['product']->id)->whereHas('invoice', function ($query) use ($situation) {
                $query->where('situation','!=',$situation);
            })->with('invoice.user')->latest()->paginate(15);


        // return $data;
        
        $data['totalPrice'] = Order::where('product_id',$data['product']->id)->whereHas('invoice', function ($query) use ($situation) {$query->where('situation','!=',$situation);})->sum("total")/10;
        $data['totalSell'] = Order::where('product_id',$data['product']->id)->whereHas('invoice', function ($query) use ($situation) {$query->where('situation','!=',$situation);})->sum("qty");
        // $data['totalDiscount'] = Order::where('product_id',$data['product']->id)->whereHas('invoice', function ($query) use ($situation) {$query->where('situation','!=',$situation);})->sum("discount");


        return view('admin.report.detail.main',compact('data'));
    }
}
