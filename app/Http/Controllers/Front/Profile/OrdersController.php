<?php

namespace App\Http\Controllers\Front\Profile;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Entry;
use Illuminate\Http\JsonResponse;
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

    public function __construct()
    {
        $this->middleware('auth');
        View::share('categories', Category::defaultOrder()->toTree()->get());
    }

    public function main()
    {
        $userId = Auth::id();
        $data['invoice'] = Invoice::with('orders.product', 'orders.detail')->where('user_id', $userId)->where('situation', '!=', 'finish')->paginate(10);
        $data['today'] = Carbon::now()->toDateString();
        return view('profile.orders.main.main', compact('data'));
    }

    public function history()
    {
        $userId = Auth::id();
        $data['invoice'] = Invoice::with('detail', 'orders.product', 'orders.detail')->where('user_id', $userId)->where('situation', 'finish')->paginate(5);
        return view('profile.orders.history.main', compact('data'));
    }

    public function tracking()
    {
        return view('profile.orders.tracking.main');
    }

    public function check_send_code(Request $request){
        $user = auth()->user();
        $current = Carbon::now();
        $code = $request->code;
        $number = $request->number;

        $invoice = Invoice::find($code);
        if (!$invoice)
            return response()->json(['error' => true,'text' => 'کد پیگیری اشتباه است']);


        if (!$number){
                return response()->json(['text'=>'شماره را وارد کنید','error'=>true]);
            }



            $entry = Entry::where('user_id', $user->id)->first();
            if (!$entry) {
                $entry = Entry::create([
                    'user_id' => $user->id,
                    'code' => $number,
                    'expire' => $current->addMinute(2),
                ]);
            } else {
                $entry->code = $number;
                $entry->expire = $current->addMinute(2);
                $entry->save();
            }


            if ($number && $code)
                $this->Sendsms($number, 'AuthUser', $code, $code, null, null);

        return response()->json(['text'=>'کد ارسال شد','error'=>false]);
    }

    public function check(Request $request)
    {
        $user = auth()->user();
        $current = Carbon::now();
        $code = $request->code;
        $auth_code = $request->auth_code;



        $entry = Entry::where([['code',$auth_code],['user_id',$user->id]])->first();

        if(!$entry){
            return response()->json(['error' => true,'text' => 'کد اشتباه است.']);
        }


        $now = Carbon::now();
        $active = Carbon::parse($entry->expire);
        if ($now > $active) {
            return response()->json(['error' => true,'text' => 'زمان ورود به پایان رسیده، لطفا دوباره تلاش کن.']);

        }
        $entry->delete();

        $invoice = Invoice::find($code);
        if (!$invoice)
            return response()->json(['error' => true,'text' => 'کد پیگیری اشتباه است']);

        return response()->json(['error' => false,'text' => $invoice->situation]);
    }

    public function Success($id)
    {
        $invoice = Invoice::with('user')->find($id);
        $userId = Auth::id();
        if ($invoice->situation = 'arrived' && $invoice->user_id == $userId) {
            $invoice->situation = 'finish';
            $invoice->finish_date = Carbon::now()->toDateTimeString();
            $invoice->save();
            if ($invoice->user->mobile & $invoice->pay_num) {
                $this->Sendsms($invoice->user->mobile, 'FinishStage', $invoice->pay_num, null, null, $invoice->user->name);
            }
            Survey::create([
                'invoice_id' => $invoice->id,
            ]);
            if ($invoice->user->mobile && $invoice->user->name) {
                $this->Sendsms($invoice->user->mobile, 'Survey', $invoice->pay_num, null, null, $invoice->user->name);
            }

            return redirect()->route('OrderHistory')->withErrors(['با تشکر سفارش شما با موفقیت به وضعیت پایان تغییر یافت، با شرکت در نظرسنجی ما را در بهبود ارتقای کیفیت و خدمت‌رسانی یاری کنید.']);
        }
    }

    public function Delete($id)
    {
        $invoice = Invoice::find($id);
        $userId = Auth::id();
        if ($invoice->situation = 'unpaid' && $invoice->user_id == $userId) {
            $invoice->orders()->delete();
            $invoice->delete();
            return redirect()->back()->withErrors(['پیش‌فاکتور شما با موفقیت از سیستم حذف شد!']);
        }
    }

    public function get(): JsonResponse
    {
        $userId = Auth::id();

        $data['invoice_unpaid'] = Invoice::with('orders.product', 'orders.detail', 'address')->where('user_id', $userId)
            ->where('situation', 'unpaid')->orderBy('created_at', 'desc')->get();
        $data['invoice_paid'] = Invoice::with('orders.product', 'orders.detail', 'address')->where('user_id', $userId)
            ->where('situation', 'paid')->orderBy('created_at', 'desc')->get();
        $data['invoice_finish'] = Invoice::with('orders.product', 'orders.detail', 'address')->where('user_id', $userId)
            ->where('situation', 'finish')->orderBy('created_at', 'desc')->get();
        $data['invoice_current'] = Invoice::with('orders.product', 'orders.detail', 'address')->where('user_id', $userId)
            ->where('situation', 'production')
            ->orWhere([['situation', 'sending'], ['user_id', $userId]])
            ->orWhere([['situation', 'arrived'], ['user_id', $userId]])
            ->orderBy('created_at', 'desc')->get();

        return response()->json($data);
    }

    public function getOne($id): JsonResponse
    {
        $userId = Auth::id();

        $invoice = Invoice::with('orders.product', 'orders.detail', 'user', 'address')->where([['user_id', $userId], ['id', $id], ['situation', '!=', 'unpaid']])->first();
        return response()->json($invoice);
    }

    public function show()
    {

    }


    public function factor($id)
    {
        return view('profile.orders.invoice.main', compact('id'));
    }
}
