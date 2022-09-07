<?php

namespace App\Http\Controllers\Front\Profile;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Auth;
use App\Models\Invoice;
use App\Models\Survey;
use Carbon\Carbon;
use App\Traits\Smstrait;
use Illuminate\Support\Facades\View;

class OrdersController extends Controller
{
    use Smstrait;
    public function __construct(){$this->middleware('auth');
        View::share('categories',Category::defaultOrder()->toTree()->get());
    }

	public function main()
	{
      	$userId = Auth::id();
        $data['invoice'] = Invoice::with('orders.product','orders.detail')->where('user_id', $userId)->where('situation','!=','finish')->paginate(10);
        $data['today'] = Carbon::now()->toDateString();
		return view('profile.orders.main.main', compact('data'));
	}

	public function history()
	{
      	$userId = Auth::id();
        $data['invoice'] = Invoice::with('detail','orders.product','orders.detail')->where('user_id', $userId)->where('situation','finish')->paginate(5);
		return view('profile.orders.history.main',compact('data'));
	}

	public function tracking()
	{
		return view('profile.orders.tracking.main');
	}

    public function check(){

    }

    public function Success($id){
        $invoice = Invoice::with('user')->find($id);
        $userId = Auth::id();
        if ($invoice->situation = 'arrived' && $invoice->user_id == $userId) {
            $invoice->situation = 'finish';
            $invoice->finish_date=Carbon::now()->toDateTimeString();
            $invoice->save();
            if ($invoice->user->mobile & $invoice->pay_num) {
                $this->Sendsms($invoice->user->mobile, 'FinishStage', $invoice->pay_num,null,null,$invoice->user->name);
            }
            Survey::create([
                'invoice_id' => $invoice->id,
            ]);
            if ($invoice->user->mobile && $invoice->user->name) {
                $this->Sendsms($invoice->user->mobile, 'Survey', $invoice->pay_num,null,null,$invoice->user->name);
            }

            return redirect()->route('OrderHistory')->withErrors(['با تشکر سفارش شما با موفقیت به وضعیت پایان تغییر یافت، با شرکت در نظرسنجی ما را در بهبود ارتقای کیفیت و خدمت‌رسانی یاری کنید.']);
        }
    }

    public function Delete($id){
        $invoice = Invoice::find($id);
        $userId = Auth::id();
        if ($invoice->situation = 'unpaid' && $invoice->user_id == $userId) {
            $invoice->orders()->delete();
            $invoice->delete();
            return redirect()->back()->withErrors(['پیش‌فاکتور شما با موفقیت از سیستم حذف شد!']);
        }
    }

}
