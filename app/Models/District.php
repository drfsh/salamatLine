<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class District extends Model
{
    use SoftDeletes;
    
    public $timestamps = false;

    protected $connection = 'mysql';

    public function city()
    {
        return $this->belongsTo('App\Models\City');
    }
}
