<?php
namespace App\Models;

use App\Models\Product;
use Spatie\Searchable\Searchable;
use Rinvex\Categories\Models\Category as RinvexCategory;
use CyrildeWit\EloquentViewable\InteractsWithViews;
use CyrildeWit\EloquentViewable\Contracts\Viewable;

class Category extends RinvexCategory implements Viewable
{
    use InteractsWithViews;

    protected $appends = [
        'child_count'
    ];
    public function getChildCountAttribute()
    {
        return Category::where([['parent_id',$this->id]])->count();
    }
    public function getImgAttribute($value)
    {
        if ($value!==null)
        return '/img/category/'.$value;
        else
            return null;
    }
    function descendants(){
        return $this->hasMany(Category::class,'parent_id','id');
    }
    public static function scopeDefaultOrder($query){
        return $query->where('hide',false)->orderBy('_lft','asc');
    }
    public static function scopeHide($query){
        return $query->where('hide',false);
    }
    public static function scopeToTree($query){
        return $query->where('parent_id',null)->where('hide',false);
    }
    public function children(){
        return Category::where([['parent_id',$this->id],['hide',false]])->defaultOrder()->get();
    }
}