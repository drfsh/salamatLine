<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use ChristianKuri\LaravelFavorite\Traits\Favoriteable;
use CyrildeWit\EloquentViewable\InteractsWithViews;
use CyrildeWit\EloquentViewable\Contracts\Viewable;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;
use Codebyray\ReviewRateable\Contracts\ReviewRateable;
use Codebyray\ReviewRateable\Traits\ReviewRateable as ReviewRateableTrait;
use OwenIt\Auditing\Contracts\Auditable;
use DB;
use Notowo;
use Illuminate\Notifications\Notifiable;

class Product extends Model implements Searchable, Viewable, ReviewRateable, Auditable
{
    use Favoriteable, SoftDeletes, InteractsWithViews, ReviewRateableTrait, \Rinvex\Categories\Traits\Categorizable, \OwenIt\Auditing\Auditable;
    use Notifiable;

    protected $connection = 'mysql';

    public function scopePublished($query)
    {
        return $query->whereNotNull('image');
    }

    protected $appends = [
        'tiny', 'large', 'showing_price', 'price_letter', 'discount_price'
    ];

    public function brand()
    {
        return $this->belongsTo('App\Models\Brand')->select('id', 'title', 'slug');
    }

    public function country()
    {
        return $this->belongsTo('App\Models\Country')->select('id', 'title', 'slug');
    }

    public function feature()
    {
        return $this->hasOne('App\Models\Feature');
    }

    public function inventory()
    {
        return $this->hasMany('App\Models\Inventory');
    }

    public function discount()
    {
        return $this->hasMany('App\Models\Discount')
            ->whereRaw('max_uses > uses')
            ->where('end_date','>',verta()->format('Y/m/d'))
            ->where('start_date','<=',verta()->format('Y/m/d'))
            ->where('active', true)
            ->orderBy('price', 'Desc')
            ->select('id', 'price', 'max_uses', 'uses', 'product_id', 'price_id', 'feature_id', 'start_date', 'end_date');
    }

    public function getTinyAttribute()
    {
        if (!$this->image) {
            return null;
        }
        return asset('img/product/tiny/' . $this->image);
    }

    public function getLargeAttribute()
    {
        if (!$this->image) {
            return null;
        }
        return asset('img/product/' . $this->image);
    }


    public function getCreatedAtAttribute($value)
    {
        return Verta($value)->format('l d F Y ساعت H:i');
    }

    public function getUpdatedAtAttribute($value)
    {
        return Verta($value)->format('Y/m/d');
    }

    public function photos()
    {
        return $this->hasMany('App\Models\ProductPhoto', 'product_id')->select('id', 'product_id', 'filename');
    }

    public function multiprice()
    {
        return $this->hasMany('App\Models\Multiprice')->select('id', 'product_id', 'title', 'price')->orderBy('price', 'asc');
    }

    public function multifeature()
    {
        return $this->hasMany('App\Models\Multifeature')->select('id', 'product_id', 'title');
    }

    public function order()
    {
        return $this->hasMany('App\Models\Order');
    }

    public function seo()
    {
        return $this->morphOne('App\Models\Seo', 'seoable');
    }

    public function collection()
    {
        return $this->belongsToMany('App\Models\Collection');
    }

    public function getShowingPriceAttribute()
    {
        if ($this->price) {
            return number_format($this->price / 10) . '<span>تومان</span>';
        }
        $multiprice = DB::table('multiprices')->where('product_id', $this->id)->orderBy('price', 'asc')->limit(1)->pluck('price')->first();
        return '<span>از</span>' . number_format($multiprice / 10) . '<span>تومان</span>';
    }

    public function getPriceLetterAttribute()
    {
        if ($this->price) {
            return notowo($this->price / 10, 'fa')->currency('تومان');
        }
        $multiprice = DB::table('multiprices')->where('product_id', $this->id)->orderBy('price', 'asc')->limit(1)->pluck('price')->first();
        return 'از ' . notowo($multiprice / 10, 'fa')->currency('تومان');

    }

    public function getDiscountPriceAttribute()
    {
        if ($this->price && $this->discount()->exists()) {
            return number_format(($this->price - $this->discount[0]->price) / 10) . '<span>تومان</span>';
        } elseif ($this->multiprice()->exists() && $this->discount()->exists()) {
            return 'از ' . number_format(($this->discount[0]->multiprice->price - $this->discount[0]->price) / 10) . '<span>تومان</span>';
        }
        return null;
    }

    public function getSearchResult(): SearchResult
    {
        $url = route('product', $this->slug);
        return new \Spatie\Searchable\SearchResult(
            $this,
            $this->title,
            $url
        );
    }

}
