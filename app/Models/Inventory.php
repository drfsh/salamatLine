<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;

    protected $fillable = ['qty', 'product_id', 'price_id', 'feature_id'];
    
    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }

    public function multiprice()
    {
        return $this->belongsTo('App\Models\Multiprice', 'price_id');
    }

    public function multifeature()
    {
        return $this->belongsTo('App\Models\Multifeature', 'feature_id');
    }
}
