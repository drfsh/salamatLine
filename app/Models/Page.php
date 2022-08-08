<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Page extends Model
{
    use HasFactory, SoftDeletes;
    protected $appends = [
        'image'
    ];
    
    public function seo()
    {
        return $this->morphOne('App\Models\Seo', 'seoable');
    }

    public function getImageAttribute($value)
    {
        if ($value) {
            return asset('img/page/' . $value);
        }else{
            return null;
        } 
    }
}
