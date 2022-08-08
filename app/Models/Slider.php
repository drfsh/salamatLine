<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
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
        return asset('img/slider/tiny/' . $this->image);
    }

    public function getLargeAttribute(){
        if (!$this->image) {
            return null;
        }
        return asset('img/slider/' . $this->image);
    }
}
