<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;

class Feature extends Model implements Auditable
{
    use SoftDeletes,\Rinvex\Categories\Traits\Categorizable,\OwenIt\Auditing\Auditable;

    protected $guarded =[];
//    protected $fillable = ['product_id', 'material_id', 'weight', 'numberin', 'length', 'width', 'height', 'volume', 'purity', 'density', 'company_id', 'guarantee', 'warranty', 'teamstar', 'expire_at', 'kind', 'mechanism', 'operation', 'transport', 'content', 'days'];

    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }
    public function material()
    {
        return $this->belongsTo('App\Models\Material');
    }
    public function company()
    {
        return $this->belongsTo('App\Models\Company')->select('id','title','slug');
    }

    public function getVolumeAttribute($value){
        if (!$value) {return null;}
        if ($value < 1000) {
            return ($value.' میلی‌لیتر');
        }
        if ($value >= 1000) {
            $vol = $value/1000;
            return ($vol.' لیتر');
        }
    }
    public function getWeightAttribute($value){
        if (!$value) {return null;}
        if ($value < 1000) {
            return ($value.' گرم');
        }
        if ($value >= 1000) {
            return (($value/1000).' کیلوگرم');
        }
    }
    public function getLengthAttribute($value){
        if (!$value) {return null;}
        if ($value < 100) {
            return ($value.' سانتیمتر');
        }
        if ($value >= 100) {
            return (($value/100).' متر');
        }
    }
    public function getWidthAttribute($value){
        if (!$value) {return null;}
        if ($value < 100) {
            return ($value.' سانتیمتر');
        }
        if ($value >= 100) {
            return (($value/100).' متر');
        }
    }
    public function getHeightAttribute($value){
        if (!$value) {return null;}
        if ($value < 100) {
            return ($value.' سانتیمتر');
        }
        if ($value >= 100) {
            return (($value/100).' متر');
        }
    }
    public function getDiameterAttribute($value){
        if (!$value) {return null;}
        if ($value < 100) {
            return ($value.' سانتیمتر');
        }
        if ($value >= 100) {
            return (($value/100).' متر');
        }
    }
    public function getGuaranteeAttribute($value){
        if (!$value) {return null;}
        if ($value < 12) {
            return ($value.' ماه');
        }
        if ($value >= 12) {
            return (($value/12).' سال');
        }
    }
    public function getWarrantyAttribute($value){
        if (!$value) {return null;}
        if ($value < 12) {
            return ($value.' ماه');
        }
        if ($value >= 12) {
            return (($value/12).' سال');
        }
    }
    public function getMechanismAttribute($value){
        if (!$value) {return null;}
        if ($value == 'mechanical') {
            return ('مکانیکی');
        }elseif ($value == 'electrical') {
            return ('برقی');
        }elseif ($value == 'charging') {
            return ('شارژی');
        }elseif ($value == 'hand') {
            return ('دستی');
        }elseif ($value == 'battery') {
            return ('باتری');
        }elseif ($value == 'elec-batt') {
            return ('برق/باتری');
        }
    }
    public function getOperationAttribute($value){
        if (!$value) {return null;}
        if ($value == 'automatic') {
            return ('اتوماتیک');
        }elseif ($value == 'nonautomatic') {
            return ('غیراتوماتیک');
        }elseif ($value == 'semiauto') {
            return ('نیمه‌اتوماتیک');
        }
    }
    public function getTransportAttribute($value){
        if (!$value) {return null;}
        if ($value == 'small') {
            return ('کوچک');
        }elseif ($value == 'medium') {
            return ('متوسط');
        }elseif ($value == 'big') {
            return ('بزرگ');
        }else {
            return ('خیلی بزرگ');
        }
    }
    public function getKindAttribute($value){
        if (!$value) {return null;}
        if ($value == 'sterile') {
            return ('استریل');
        }elseif ($value == 'nonsterile') {
            return ('غیراستریل');
        }
    }

}
