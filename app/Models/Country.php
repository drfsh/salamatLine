<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;

class Country extends Model implements Searchable
{
    use SoftDeletes;
    public $timestamps = false;



    public function getImageAttribute($value){
        if ($value) {
            return asset('img/country/' . $value);
        }
        return null;
    }


    public function product()
    {
        return $this->hasMany('App\Models\Product');
    }
    
    public function seo()
    {
        return $this->morphOne('App\Models\Seo', 'seoable');
    }

     public function getSearchResult(): SearchResult
     {
        $url = route('country', $this->slug);
         return new \Spatie\Searchable\SearchResult(
            $this,
            $this->title,
            $url
         );
     }


}
