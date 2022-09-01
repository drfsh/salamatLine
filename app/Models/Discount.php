<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;

class Discount extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['title', 'price' , 'max_uses', 'active', 'content', 'product_id', 'price_id', 'feature_id','start_date','end_date'];

    protected $appends = ['percent'];


    public function product()
    {
        return $this->belongsTo('App\Models\Product')->select('id','title','slug','price');
    }

    public function multiprice()
    {
        return $this->belongsTo('App\Models\Multiprice', 'price_id')->select('id','product_id','title','price');
    }

    public function multifeature()
    {
        return $this->belongsTo('App\Models\Multifeature', 'feature_id')->select('id','product_id','title');
    }

    public function getCreatedAtAttribute($value){
        return Verta($value)->format('l d F Y ساعت H:i');
    }

    public function getPercentAttribute(){
        if ($this->price_id) {
            $multiprice = DB::table('multiprices')->where('id',$this->price_id)->first();
            $percent = ($this->price*100)/$multiprice->price;
            return round($percent,0).'%';
        }
        $product = DB::table('products')->where('id',$this->product_id)->first();
        $percent = ($this->price*100)/$product->price;
        return round($percent,0).'%';
    }

}
