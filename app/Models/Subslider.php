<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subslider extends Model
{
    use HasFactory;
    protected $appends = [
        'tiny', 'large'
     ];
     public function getTinyAttribute()
     {
         if (!$this->image) {
            return null; 
         }
         return asset('img/subslider/tiny/' . $this->image);
     }
 
     public function getLargeAttribute(){
         if (!$this->image) {
             return null;
         }
         return asset('img/subslider/' . $this->image);
     }
}
