<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class City extends Model
{
    use SoftDeletes;

    public $timestamps = false;

    protected $connection = 'mysql';
    public $table = 'cities';

    public function province()
    {
        return $this->belongsTo('App\Models\Province');
    }
    public function district()
    {
        return $this->hasMany('App\Models\District');
    }
}
