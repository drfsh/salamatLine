<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Province extends Model
{
    use SoftDeletes;

    public $timestamps = false;

    protected $connection = 'mysql';

    public function city()
    {
        return $this->hasMany('App\Models\City');
    }
}
