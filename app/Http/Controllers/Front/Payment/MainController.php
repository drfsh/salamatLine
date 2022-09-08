<?php

namespace App\Http\Controllers\Front\Payment;

use App\Http\Controllers\Controller;
use App\Bank\Pasargad\Pasargad;
use App\Models\Category;
use Illuminate\Http\Request;
use Auth;
use App\Models\Invoice;
use App\Models\Order;
use App\Models\Inventory;
use App\Models\Product;
use App\Models\Multiprice;
use App\Traits\Smstrait;
use App\Traits\InvoiceGenerator;
use App\Traits\CheckAddress;
use Carbon\Carbon;
use Cart;
use Illuminate\Support\Facades\View;
use Log;

class MainController extends Controller
{

	use InvoiceGenerator,CheckAddress,Smstrait;

	public function __construct(Pasargad $bank)
	{
		$this->bank = $bank;
        View::share('categories',Category::defaultOrder()->toTree()->get());

    }

	public function main(Request $request){

		// return response()->json(['state' => 'alert','text' => 'در حال حاضر درگاه پرداخت غیر فعال می‌باشد.']);

		$userId = Auth::id();
		$address_id = $request->address;
		$delivery_time = $request->delivery;

		$ad = $this->Address($address_id,$userId);

		$shipping = Cart::session($userId)->getCondition('Shipping')->getValue();

		$invoice = $this->CreateInvoice($userId,$ad,$address_id,$delivery_time,$shipping);

		$payment_data = $this->bank->paymentRequest($invoice->grand_total, 'https://salamatline.com/payment/pasargad-callback', $invoice->id);
		return response()->json(['state' => 'success','payment' => $payment_data,'text' => 'در حال انتقال به درگاه پرداخت']);


		// Log::info($address_id);
		// Log::info($delivery_time);
	}

	public function repay(Request $request, $id){

		$invoice = Invoice::find($id);
		if($request->due_date == null){
			return response()->json(['text' => 'یک روز انتخاب کنید.', 'color' => 'alert']);
		}

		foreach($invoice->orders as $item){
			$pid = $item->product_id;
			$oldprice = $item->price;
			$product = Product::where('id',$pid)->first();
			if($item->detail){
				$mid = $item->detail->price_id;
				$mulprice = Multiprice::where('id',$mid)->first();
				if($product && $mulprice && $mulprice->price > $oldprice){
					return response()->json(['text' => 'به علت تغییر قیمت '.$product->title.' امکان پرداخت این فاکتور وجود ندارد', 'color' => 'alert']);
				}
			}else{
				if($product && $product->price > $oldprice){
					return response()->json(['text' => 'به علت تغییر قیمت '.$product->title.' امکان پرداخت این فاکتور وجود ندارد', 'color' => 'alert']);
				}
			}
		}

		$invoice->due_date = $request->due_date;
		$invoice->save();

		$payment_data = $this->bank->paymentRequest($invoice->grand_total, 'https://salamatline.com/payment/pasargad-callback', $invoice->id);
		return response()->json(['payment' => $payment_data,'text' => 'در حال انتقال به درگاه پرداخت', 'color' => 'success']);

	}


	public function passarGadCallback(Request $request)
	{

		$invoiceId = $request->query('iN');
		$invoiceDate = $request->query('iD');
		$transactionReferenceID = $request->query('tref');
		$invoice = Invoice::with('user')->findOrFail($invoiceId);
		$transActionResult = $this->bank->getResult($transactionReferenceID)["resultObj"];
		if ($transActionResult["result"] == "True") {
			//verify it
			//better to be replaced with db info
			$invoiceNumber = $transActionResult["invoiceNumber"];
			$invoiceDate = $transActionResult["invoiceDate"];
			$amount = $transActionResult["amount"]; // $invoice->grand_total;//
			$verifyResult = $this->bank->verify($invoiceNumber, $invoiceDate, $amount);
			if ($verifyResult["actionResult"]["result"] == "True") {
				$invoice->situation = 'paid';

				if ($invoice->pay_num == null) {
					$lastPay = Invoice::where('situation','!=','unpaid')->latest('pay_num')->first();
					$invoice->pay_num = $lastPay->pay_num + 1;
				}
				$invoice->pay_date = Carbon::now()->toDateTimeString();
				$invoice->save();

				if(!$invoice->creator_id){
					Cart::session($invoice->user_id)->clearCartConditions();
					Cart::session($invoice->user_id)->clear();
				}

				if ($invoice->user->mobile && $invoice->pay_num) {
					$this->Sendsms($invoice->user->mobile, 'SuccessfulPayment', $invoice->pay_num,null,null,$invoice->user->name);
				}

				$orders = Order::where('invoice_id', $invoiceId)->get();
				foreach ($orders as $item) {
					if(isset($item->detail)){
						$mp = $item->detail->price_id;
						$mf = $item->detail->feature_id;
					}else{
						$mp = null;
						$mf = null;
					}

					$inventory = Inventory::where('product_id',$item->product_id)->where('price_id',$mp)->where('feature_id',$mf)->first();
					if($inventory){
					$available = $inventory->qty - $item->qty;
						if($available <= 0){
							$inventory->qty = 0;
						}else{
							$inventory->qty = $available;
						}
					$inventory->save();
					}
				}

				$data = array(
					'color' => 'success',
					'title' => 'پرداخت انجام شد',
					'msg' => 'با تشکر سفارش شما دریافت شد، تمامی مراحل از طریق پیامک اطلاع‌رسانی خواهد شد. همچنین شما میتوانید با مراجه به بخش سفارشات وضعیت آن را مشاهده نمایید.',
					'number' => $invoiceId,
					'animation' => 'face',
				);

				return view('front.cart.msg',compact('data'));
			} else{

				$data = array(
					'color' => 'success',
					'title' => 'پرداخت انجام شد',
					'msg' => 'با تشکر سفارش شما دریافت شد، تمامی مراحل از طریق پیامک اطلاع‌رسانی خواهد شد. همچنین شما میتوانید با مراجه به بخش سفارشات وضعیت آن را مشاهده نمایید.',
					'number' => $invoiceId,
					'animation' => 'face',
				);

				return view('front.cart.msg',compact('data'));
				// return response()->json($verifyResult);
			}
		} else {

			$data = array(
				'color' => 'alert',
				'title' => 'پرداخت انجام نشد',
				'msg' => 'پرداخت شما به دلایلی انجام نشده است، لطفا مجددا تلاش نمایید.',
				'number' => $invoiceId,
				'animation' => 'face2',
			);


			// return response()->json($transActionResult);
			return view('front.cart.msg',compact('data'));
			// return response()->json('error');
		}
	}




}
