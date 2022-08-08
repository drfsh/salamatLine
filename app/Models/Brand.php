<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;

class Brand extends Model implements Searchable
{
    use HasFactory;
    use SoftDeletes;
    protected $appends = [
        'tiny','large'
    ];
    public function getTinyAttribute()
    {
        if (!$this->image) {
           return asset('img/brand/default.png');
        }
        return asset('img/brand/tiny/' . $this->image);
    }
    public function getLargeAttribute(){
        if (!$this->image) {
            return null;
        }
        return asset('img/brand/' . $this->image);
    }

    public function product()
    {
        return $this->hasMany('App\Models\Product');
    }

    public function seo()
    {
        return $this->morphOne('App\Models\Seo', 'seoable');
    }
    public function companies()
    {
        return $this->belongsToMany('App\Models\Company');
    }

     public function getSearchResult(): SearchResult
     {
        $url = route('brand', $this->slug);
         return new \Spatie\Searchable\SearchResult(
            $this,
            $this->title,
            $url
         );
     }

}
