<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Material extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function feature()
    {
        return $this->hasMany('App\Models\Feature');
    }

    public function seo()
    {
        return $this->morphOne('App\Models\Seo', 'seoable');
    }
}
