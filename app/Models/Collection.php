<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Collection extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function products()
    {
    	return $this->belongsToMany('App\Models\Product');
    }

    public function seo()
    {
        return $this->morphOne('App\Models\Seo', 'seoable');
    }

}
