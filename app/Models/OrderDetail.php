<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    // use HasFactory;
    protected $connection = 'mysql2';
    
    public $timestamps = false;
	public $incrementing = false;
    protected $primaryKey = 'order_id';
    protected $fillable = ['order_id','inventory_qty','discount','discount_id','price_id','feature_id','content'];
}
