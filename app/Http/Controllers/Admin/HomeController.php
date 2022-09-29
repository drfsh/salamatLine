<?php

namespace App\Http\Controllers\Admin;

use App\Filters\ProductFilter;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Company;
use App\Models\Country;
use App\Models\Invoice;
use App\Models\Material;
use App\Traits\Smstrait;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use Analytics;
use Spatie\Analytics\Period;
use Verta;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth', 'isAdmin']);
    }


    protected function mvp($data)
    {
        return $data->filter(function ($item) {
            return starts_with($item['url'], '/products/');
        });
    }

    protected function mvc($data)
    {
        return $data->filter(function ($item) {
            return starts_with($item['url'], '/category/');
        });
    }

    protected function mvb($data)
    {
        return $data->filter(function ($item) {
            return starts_with($item['url'], '/brands/');
        });
    }


    public function main($days = 60, $limit = 90)
    {
        $d = \request()->get('days');
        if (is_numeric($d))
            $days = $d;

        $report = Analytics::fetchMostVisitedPages(Period::days($days), $limit);
        $data['product_count'] = Product::count();
        $data['product_publish_count'] = Product::published()->count();

        $data['user_count'] = User::count();
        $data['user_admin_count'] = User::role('Admin')->count();
        $data['category_count'] = Category::count();
        $data['brand_count'] = Brand::count();
        $data['company_count'] = Company::count();
        $data['material_count'] = Material::count();
        $data['country_count'] = Country::count();

        // Green Box
        $data['total_income'] = Invoice::where('situation', '!=', 'unpaid')->sum('grand_total') / 10;
        $data['total_shipping'] = Invoice::where('situation', '!=', 'unpaid')->sum('shipping') / 10;
        $data['pure_income'] = ($data['total_income'] - $data['total_shipping']);
        $data['online_income'] = Invoice::where('situation', '!=', 'unpaid')->whereNull('creator_id')->sum('grand_total') / 10;
        $data['factor_income'] = Invoice::where('situation', '!=', 'unpaid')->whereNotNull('creator_id')->sum('grand_total') / 10;
        // Red box
        $data['paid_income'] = Invoice::where('situation', 'paid')->sum('grand_total') / 10;
        $data['paid_production'] = Invoice::where('situation', 'production')->sum('grand_total') / 10;
        $data['paid_sending'] = Invoice::where('situation', 'sending')->sum('grand_total') / 10;
        $data['paid_arrived'] = Invoice::where('situation', 'arrived')->sum('grand_total') / 10;
        $data['paid_finish'] = Invoice::where('situation', 'finish')->sum('grand_total') / 10;


        $year_shamsi = verta()->year;

        // Total season
        $quarter = verta()->quarter;
        if ($quarter == 1) {
            $data['season'] = 'بهار' . ' ' . $year_shamsi;
        } elseif ($quarter == 2) {
            $data['season'] = 'تابستان' . ' ' . $year_shamsi;
        } elseif ($quarter == 3) {
            $data['season'] = 'پاییز' . ' ' . $year_shamsi;
        } elseif ($quarter == 4) {
            $data['season'] = 'زمستان' . ' ' . $year_shamsi;
        }
        $quarter_start = verta()->startQuarter()->formatGregorian('Y-m-d H:i:s');
        $quarter_finish = verta()->endQuarter()->formatGregorian('Y-m-d H:i:s');
        $data['total_quarter'] = Invoice::where('situation', '!=', 'unpaid')->whereBetween('pay_date', [$quarter_start, $quarter_finish])->sum("grand_total") / 10;
        // Total month
        $data['month_name'] = verta()->format('%B %Y');
        $month_start = verta()->startMonth()->formatGregorian('Y-m-d H:i:s');
        $month_finish = verta()->endMonth()->formatGregorian('Y-m-d H:i:s');
        $data['total_month'] = Invoice::where('situation', '!=', 'unpaid')->whereBetween('pay_date', [$month_start, $month_finish])->sum("grand_total") / 10;
        // Total Week
        $data['week_name'] = 'هفته‌ی ' . verta()->weekOfYear;
        $week_start = verta()->startWeek()->formatGregorian('Y-m-d H:i:s');
        $week_finish = verta()->endWeek()->formatGregorian('Y-m-d H:i:s');
        $data['total_week'] = Invoice::where('situation', '!=', 'unpaid')->whereBetween('pay_date', [$week_start, $week_finish])->sum("grand_total") / 10;
        // Total today
        $data['today_name'] = Verta::today()->format('l');
        $today = Verta::today()->formatGregorian('Y-m-d');
        $data['total_today'] = Invoice::where('situation', '!=', 'unpaid')->whereDate('pay_date', '=', $today)->sum("grand_total") / 10;
        // Total yesterday
        $data['today_yesterday'] = Verta::yesterday()->format('l');
        $yesterday = Verta::yesterday()->formatGregorian('Y-m-d');
        $data['total_yesterday'] = Invoice::where('situation', '!=', 'unpaid')->whereDate('pay_date', '=', $yesterday)->sum("grand_total") / 10;

        $data['browser'] = Analytics::fetchTopBrowsers(Period::days(30), 3);
        $data['pages'] = Analytics::fetchMostVisitedPages(Period::days(30), 6);
        $data['userTypes'] = Analytics::fetchUserTypes(Period::days(0));

        if (sizeof($data['userTypes']) == 0) {
            $data['userTypes'][0] = ['sessions'=>0];
            $data['userTypes'][1] = ['sessions'=>0];
        }

        $data['mvp'] = $this->mvp($report);
        $data['mvc'] = $this->mvc($report);
        $data['mvb'] = $this->mvb($report);



        return view('admin.home.main', compact('data', 'days'));
    }


    public function components()
    {
        return view('admin.components.main');
    }
    use Smstrait;

    public function test(ProductFilter $filters, Request $request)
    {
        dd(route('home').'/products/محلول-الکلی-ضد-عفونی-کننده-محل-تزریق-و-پوست-درموسپت-آی-ان-جی-سایز-100میلی-لیتر');
//        $this->Sendsms('09164324749', 'ReStock', 'http://localhost/product/محلول-الکلی-ضد-عفونی-کننده-محل-تزریق-و-پوست-درموسپت-آی-ان-جی-سایز-100میلی-لیتر',null,null,'مهدی');
    }
}
