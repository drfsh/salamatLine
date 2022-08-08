<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $connection = 'mysql2';
    
    protected $fillable = [
        'product_id', 'invoice_id','inventory_qty', 'qty', 'price', 'total', 'discount', 'discount_id','content'
    ];


    public function invoice()
    {
        return $this->belongsTo('App\Models\Invoice');
    }

    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }

    public function detail()
    {
        return $this->hasOne('App\Models\OrderDetail', 'order_id');
    }

}
