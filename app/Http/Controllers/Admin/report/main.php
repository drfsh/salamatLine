<?php

namespace App\Http\Controllers\Admin\report;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Invoice;
use App\Models\Order;
use DB;
use Verta;

class main extends Controller
{
    public function index(){

        // Green Box
        $data['total_income'] = Invoice::where('situation','!=','unpaid')->sum('grand_total')/10;
        $data['total_shipping'] = Invoice::where('situation','!=','unpaid')->sum('shipping')/10;
        $data['pure_income'] = ($data['total_income'] - $data['total_shipping']);
        $data['online_income'] = Invoice::where('situation','!=','unpaid')->whereNull('creator_id')->sum('grand_total')/10;
        $data['factor_income'] = Invoice::where('situation','!=','unpaid')->whereNotNull('creator_id')->sum('grand_total')/10;
        // Red box
        $data['paid_income'] = Invoice::where('situation', 'paid')->sum('grand_total')/10;
        $data['paid_production'] = Invoice::where('situation', 'production')->sum('grand_total')/10;
        $data['paid_sending'] = Invoice::where('situation', 'sending')->sum('grand_total')/10;
        $data['paid_arrived'] = Invoice::where('situation', 'arrived')->sum('grand_total')/10;
        $data['paid_finish'] = Invoice::where('situation', 'finish')->sum('grand_total')/10;



        $year_shamsi = verta()->year;

        // Total season
        $quarter = verta()->quarter;
        if ($quarter == 1) {$data['season'] = 'بهار'.' '.$year_shamsi;}elseif($quarter == 2){$data['season'] = 'تابستان'.' '.$year_shamsi;}elseif($quarter == 3){$data['season'] = 'پاییز'.' '.$year_shamsi;}elseif($quarter == 4){$data['season'] = 'زمستان'.' '.$year_shamsi;}
        $quarter_start = verta()->startQuarter()->formatGregorian('Y-m-d H:i:s');
        $quarter_finish = verta()->endQuarter()->formatGregorian('Y-m-d H:i:s');
        $data['total_quarter'] = Invoice::where('situation','!=','unpaid')->whereBetween('pay_date', [$quarter_start,$quarter_finish])->sum("grand_total")/10;
        // Total month  
        $data['month_name'] = verta()->format('%B %Y');
        $month_start = verta()->startMonth()->formatGregorian('Y-m-d H:i:s');
        $month_finish = verta()->endMonth()->formatGregorian('Y-m-d H:i:s');
        $data['total_month'] = Invoice::where('situation','!=','unpaid')->whereBetween('pay_date', [$month_start,$month_finish])->sum("grand_total")/10;
        // Total Week
        $data['week_name'] = 'هفته‌ی '.verta()->weekOfYear;
        $week_start = verta()->startWeek()->formatGregorian('Y-m-d H:i:s');
        $week_finish = verta()->endWeek()->formatGregorian('Y-m-d H:i:s');
        $data['total_week'] = Invoice::where('situation','!=','unpaid')->whereBetween('pay_date', [$week_start,$week_finish])->sum("grand_total")/10;
        // Total today
        $data['today_name'] = Verta::today()->format('l');
        $today = Verta::today()->formatGregorian('Y-m-d');
        $data['total_today'] = Invoice::where('situation','!=','unpaid')->whereDate('pay_date','=', $today)->sum("grand_total")/10;
        // Total yesterday
        $data['today_yesterday'] = Verta::yesterday()->format('l');
        $yesterday = Verta::yesterday()->formatGregorian('Y-m-d');
        $data['total_yesterday'] = Invoice::where('situation','!=','unpaid')->whereDate('pay_date','=', $yesterday)->sum("grand_total")/10;

        // MostSellChart
        $situation = 'unpaid';

        $data['MostSell'] = Order::select('product_id',DB::raw('count(*) as total'),DB::raw('SUM(qty) as totalQTY'))
            ->whereHas('invoice', function ($query) use ($situation) {
                $query->where('situation','!=',$situation);
            })
            ->with('product')
            ->groupBy('product_id')
            ->orderBy('totalQTY', 'desc')
            ->orderBy('total', 'desc')
            ->paginate(20);

           $data['MostSellPrice'] = Order::select('product_id',DB::raw('count(*) as total'),DB::raw('SUM(qty) as totalQTY'),DB::raw('SUM(total) as sell'))
            ->whereHas('invoice', function ($query) use ($situation) {
            $query->where('situation','!=',$situation);
            })
            ->with('product')
            ->groupBy('product_id')
            ->orderBy('sell', 'desc')
            ->paginate(20);
            // return $data['MostSell'];
        return view('admin.report.main.main',compact('data'));
    }
}
