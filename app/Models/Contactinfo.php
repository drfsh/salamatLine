<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contactinfo extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $appends = [
        'mappin', 'image'
    ];
    public function getImageAttribute($value)
    {
        if ($value) {
            return asset('img/contact/' . $value);
        }else{
            return null;
        }
    }
    public function getMappinAttribute($value)
    {
        if ($value) {
            return asset('img/contact/' . $value);
        }else{
            return null;
        }
    }

    public function seo()
    {
        return $this->morphOne('App\Models\Seo', 'seoable');
    }
}
