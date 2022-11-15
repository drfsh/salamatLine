<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;
    protected $appends = [
        'tiny', 'large','name_page'
     ];
     public function getTinyAttribute()
     {
         if (!$this->image) {
            return null; 
         }
         return asset('img/banner/tiny/' . $this->image);
     }
 
     public function getLargeAttribute(){
         if (!$this->image) {
             return null;
         }
         return asset('img/banner/' . $this->image);
     }

     public function getNamePageAttribute(){
         if ($this->page==0)
             return 'صفحه اصلی';

         $page = Collection::find($this->page);
         if ($page==null )
             return 'صفحه پاک شده!';
         else
             return $page->title;
     }
}
