<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Coupon extends Model
{
    use SoftDeletes;

    protected $connection = 'mysql';

    public function invoice()
    {
        return $this->hasMany('App\Models\Invoice');
    }
}
