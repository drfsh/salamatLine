<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;

class ProductPhoto extends Model implements Auditable
{
    use SoftDeletes,\Rinvex\Categories\Traits\Categorizable,\OwenIt\Auditing\Auditable;
    protected $fillable = ['product_id', 'filename'];

    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }

    protected $appends = [
        'large','small'
    ];

    public function getLargeAttribute(){
        if (!$this->filename) {
            return null;
        }
        return asset('img/product/other/' . $this->filename);
    }

    public function getSmallAttribute(){
        if (!$this->filename) {
            return null;
        }
        return asset('img/product/other/tiny/' . $this->filename);
    }
}
