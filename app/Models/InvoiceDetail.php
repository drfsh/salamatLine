<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceDetail extends Model
{
    // use HasFactory;

    protected $connection = 'mysql2';
    
	public $incrementing = false;
    protected $primaryKey = 'invoice_id';
    public $timestamps = false;
    protected $fillable = ['coupon_id','discount'];
}
