<?php

namespace App\Providers;

use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Blade;
use Cache;
use View;
use Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        \Illuminate\Pagination\LengthAwarePaginator::defaultView('front.global.pagination');


        View::composer('*', function($view)
        {
            $view
            ->with('topbar', app('App\Models\NavMenu')->all())
            ->with('ads', app('App\Models\Ads')->where('active',true)->first())
            ->with('social', Cache::remember('social', 864000, function () {return app('App\Models\Social')->where('active', 1)->select('id','title','icon','active','link')->limit(4)->get();}))
            ->with('globalpages', Cache::remember('globalpages', 86400, function () {return app('App\Models\Page')->where('active', 1)->select('id','title','slug','active')->limit(4)->get();}))
            ->with('globalcontact', Cache::remember('globalcontact', 86400, function () {return app('App\Models\Contactinfo')->select('id','phone1','phone2','address','email','mapurl')->where('id', 1)->get();}))
            ->with('globalcollect', Cache::remember('globalcollect', 86400, function () {return app('App\Models\Collection')->select('title','slug')->limit(4)->get();}))
            ->with('unpaidinvoice', app('App\Models\Invoice')->where('situation', 'unpaid')->where('user_id', Auth::id())->count());
        });
    }
}
