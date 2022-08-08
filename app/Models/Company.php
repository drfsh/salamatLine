<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;

class Company extends Model implements Searchable
{
    use SoftDeletes;
    protected $appends = [
        'tiny','large'
    ];

    public function seo()
    {
        return $this->morphOne('App\Models\Seo', 'seoable');
    }
    public function brands()
    {
        return $this->belongsToMany('App\Models\Brand');
    }
    public function feature()
    {
        return $this->hasMany('App\Models\Feature');
    }

    public function getTinyAttribute()
    {
        if (!$this->image) {
           return null; 
        }
        return asset('img/company/tiny/' . $this->image);
    }

    public function getLargeAttribute(){
        if (!$this->image) {
            return null;
        }
        return asset('img/company/' . $this->image);
    }

     public function getSearchResult(): SearchResult
     {
        $url = route('company', $this->slug);
         return new \Spatie\Searchable\SearchResult(
            $this,
            $this->title,
            $url
         );
     }
}
