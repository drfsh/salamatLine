<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Restock extends Model{
	
	use SoftDeletes;

    public function user()
    {
        return $this->belongsTo('App\Models\User')->select('id','name','lname','mobile');
    }
    public function product()
    {
        return $this->belongsTo('App\Models\Product')->select('id','title','slug','image');
    }

    public function getCreatedAtAttribute($value){
        return Verta($value)->format('l d F Y ساعت H:i');
    } 

    public function getDeletedAtAttribute($value){
        return Verta($value)->format('l d F Y ساعت H:i');
    }     
}
