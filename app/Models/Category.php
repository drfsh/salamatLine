<?php
namespace App\Models;

use App\Models\Product;
use Rinvex\Categories\Traits\Categorizable;
use Spatie\Searchable\Searchable;
use Rinvex\Categories\Models\Category as RinvexCategory;
use CyrildeWit\EloquentViewable\InteractsWithViews;
use CyrildeWit\EloquentViewable\Contracts\Viewable;

class Category extends RinvexCategory implements Viewable
{
    use InteractsWithViews;

    protected $appends = [
        'child_count',
        'products_count',
    ];
    public function getChildCountAttribute()
    {
        return  Category_relation::where('parent_id',$this->id)->count();
    }
    public function getProductsCountAttribute()
    {
        $sub_cat_id = Category::descendantsAndSelf($this->id)->pluck('id')->toArray();
        return Product::withAnyCategories($sub_cat_id)->count();
    }
    public function getParentCatAttribute()
    {
        $re = [];
        $child =  Category_relation::where('child_id',$this->id)->get()->pluck('parent');
        foreach ($child as $v){
            if ($v!=null){
                $re[] = $v;
            }
        }
        return $re;
    }
    public function getChildCatsAttribute()
    {
        $re = [];
        $child =  Category_relation::where('parent_id',$this->id)->get()->pluck('child');
        foreach ($child as $v){
            if ($v!=null){
                $re[] = $v;
            }
        }
        return $re;
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