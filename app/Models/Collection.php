<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Collection extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $appends = [
        'products_count'
    ];

    public function products()
    {
    	return $this->belongsToMany('App\Models\Product');
    }

    public function seo()
    {
        return $this->morphOne('App\Models\Seo', 'seoable');
    }

    public function getProductsCountAttribute()
    {
        $count = 0;
        $products = $this->products;
        foreach ($products as $p)
        $count += sizeof($p);
        return $count;
    }
    public function getProductsAttribute($value)
    {
        return json_decode($value);
    }
    public function getBannersAttribute($value)
    {
        return json_decode($value);
    }
}
