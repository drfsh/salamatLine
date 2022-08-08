<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Filters\InvoiceFilter;
use App\Models\Invoice;
use App\Models\InvoiceDeatil;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\InvoiceDetail;
use App\Models\User;
use App\Models\Product;
use App\Models\Multiprice;
use App\Models\Multifeature;
use App\Models\Address;
use App\Traits\Smstrait;
use Auth;
// use Log;

class InvoiceController extends Controller
{
    use Smstrait;
    public function __construct() {
        $this->middleware(['auth', 'isAdmin']);
    }

    public function index()
    {
        return view('admin.preinvoice.main');
    }

    public function MyPreinvoice()
    {
        return view('admin.preinvoice.my.preinvoice');
    }


    public function create()
    {
        return view('admin.preinvoice.create');
    }

    public function store(Request $request)
    {
        if ($request->user_id == NULL) {
            return response()->json(['text' => 'یک کاربر مشخص کن', 'type' => 'warn']);
        }
        if ($request->due_date == NULL) {
            return response()->json(['text' => 'یک تاریخ تحویل مشخص کن', 'type' => 'warn']);
        }
        
        $address_id = $request->address_id;
        if ($address_id){
            $address = Address::find($address_id);
            $address_text = null;
            if ($address->district_id) {
                $address_text = $address->province->title.'، '.$address->city->title.'، '.$address->district->title.'، '.$address->content;
            }else{
                $address_text = $address->province->title.'، '.$address->city->title.'، '.$address->content;
            }
            $new_address_id = $address_id;
        } else {
            $address = new Address();
            $address->user_id = $request->user_id;
            $address->title = $request->title;
            $address->name = $request->name;
            $address->province_id = $request->province_id;
            $address->city_id = $request->city_id;
            $address->district_id = $request->district_id;
            $address->content = $request->content;
            $address->zipcode = $request->zipcode;
            $address->mobile = $request->mobile;
            $address->save();
            
            $new_address_id = $address->id;
            $address = Address::find($new_address_id);
            $address_text = null;
            if ($address->district_id) {
                $address_text = $address->province->title.'، '.$address->city->title.'، '.$address->district->title.'، '.$address->content;
            }else{
                $address_text = $address->province->title.'، '.$address->city->title.'، '.$address->content;
            }
            $new_address_id = $address->id;
        }

        // Log::info($new_address_id);
        // if ($new_address_id == NULL) {
        //     return response()->json(['text' => 'آدرس بزن', 'type' => 'warn']);
        // }


        $products = collect($request->products)->transform(function($product) {
            $product['product_id'] = $product['id'];
            $product['feature_id'] = $product['f_id'];
            $product['price_id'] = $product['p_id'];
            $product['total'] = $product['qty'] * $product['price'];
            return new Order($product);
        });
        
        // if($products->isEmpty()) {
        //     return response()
        //     ->json([
        //         'products_empty' => ['One or more Product is required.']
        //     ], 422);
        // };

        $userId = Auth::user()->id;
        $data = $request->except('products');
        $data['user_id'] = $request->user_id;
        $data['creator_id'] = $userId;
        $data['sub_total'] = $products->sum('total');
        $data['situation'] = 'unpaid';
        $data['shipping'] = $request->shipping;
        $data['due_date'] = $request->due_date;
        $data['address_id'] = $new_address_id;
        $data['client_address'] = $address_text;
        $data['grand_total'] = ($data['sub_total'] + $data['shipping'])  - $data['discount'];
        $invoice = Invoice::create($data);

        $Indetail = new InvoiceDetail;
        $Indetail->invoice_id = $invoice->id;
        $Indetail->discount = $request->discount;
        $Indetail->save();

        $count = 0;
        foreach($products as $product){
            $invoice->orders()->save($product);

            $price_id = $request->products[$count]['p_id'];
            $feature_id = $request->products[$count]['f_id'];
            if ($price_id || $feature_id) {
                $feature = Multifeature::find($feature_id);
                $price = MultiPrice::find($price_id);

                if($price_id != NULL && $feature_id != NULL){
                    $content = $feature->title.' - '.$price->title;
                }elseif($price_id != NULL && $feature_id == NULL){
                    $content = $price->title;
                }elseif($price_id == NULL  && $feature_id != NULL){
                    $content = $feature->title;
                }
                $detail = new OrderDetail;
                $detail->order_id = $product->id;
                $detail->price_id = $price_id;
                $detail->feature_id = $feature_id;
                $detail->content = $content;
                $detail->save();
            }
            $count = $count + 1;
        }
        if ($invoice->user->mobile && $invoice->user->name) {
            $this->Sendsms($invoice->user->mobile, 'Preinvoice', $invoice->id,null,null,$invoice->user->name);
        }
        return response()->json(['text' => 'در حال ساخت پیش فاکتور', 'type' => 'success']);
    }

    public function delete($id)
    {
        $invoice = Invoice::find($id);
        $userId = Auth::id();
        if ($invoice->creator_id != $userId) {
            return response()->json(['text' => 'سازنده این پیش فاکتور شما نیستید!', 'type' => 'warn']);
        }
        if ($invoice->situation = 'unpaid' && $invoice->creator_id == $userId) {
            // $invoice->orders->detail()->delete();
            $invoice->orders()->delete();
            // $invoice->detail()->delete();
            $invoice->delete();
            return response()->json(['text' => 'پیش فاکتور شما حذف شد.', 'type' => 'success']);
        }   
    }
}
