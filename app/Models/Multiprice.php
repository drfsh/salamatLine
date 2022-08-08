<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;

class Multiprice extends Model implements Auditable
{
    use SoftDeletes,\Rinvex\Categories\Traits\Categorizable,\OwenIt\Auditing\Auditable;

    protected $fillable = [
        'title', 'price', 'product_id'
    ];

    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }

    public function discount()
    {
        return $this->hasMany('App\Models\Discount');
    }

    public function inventory()
    {
        return $this->hasMany('App\Models\Inventory');
    }
}
