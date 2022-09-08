<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Address extends Model
{

    use SoftDeletes;

    protected $connection = 'mysql';
    protected $table = 'twinmoti_official.addresses';
    // config('database.connections.mysql.database')

    protected $fillable = ['title','name','lname','email','company','user_id','province_id','city_id','district_id','content','zipcode','mobile','lat','lng'];



    public function province()
    {
        return $this->belongsTo('App\Models\Province','province_id');
    }
    public function city()
    {
        return $this->belongsTo('App\Models\City','city_id');
    }
    public function district()
    {
        return $this->belongsTo('App\Models\District','district_id');
    }
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function getCreatedAtAttribute($value){
        return Verta($value)->format('l d F Y ساعت H:i');
    }
    public function getUpdatedAtAttribute($value){
        return Verta($value)->format('l d F Y ساعت H:i');
    }



}
