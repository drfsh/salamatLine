<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Rinvex\Categories\Traits\Categorizable;
use Spatie\Searchable\Searchable;
use Rinvex\Categories\Models\Category as RinvexCategory;
use CyrildeWit\EloquentViewable\InteractsWithViews;
use CyrildeWit\EloquentViewable\Contracts\Viewable;

class Category extends Model
{
    use InteractsWithViews,SoftDeletes;

    protected $guarded = [];
    protected $appends = [
        'products_count',
    ];

    public function getNameAttribute($value)
    {
        $names = json_decode($value);
        return $names->fa;
    }

    public function getDescriptionAttribute($value)
    {
        $description = json_decode($value);
        return $description->fa;
    }

    public function getProductsCountAttribute()
    {
        $sub_cat_id = Category_relation::getAllChildId($this->id);
        return Product::withAnyCategories($sub_cat_id)->count();
    }

    public function getParentCatAttribute()
    {
        $re = [];
        $child = Category_relation::where('category_id', $this->id)->get();
        foreach ($child as $v) {
            $parent = Category_relation::find($v->parent_id);
            if ($parent != null) {
                $re[] = $parent->category;
            }
        }
        return $re;
    }

    public function getChildCatsAttribute()
    {
        $re = [];
        $child = Category_relation::where('category_id', $this->id)->defaultOrder()->get();
        foreach ($child as $v) {
            $parent = Category_relation::where('parent_id',$v->id)->defaultOrder()->get();
            foreach ($parent as $i){
                if ($i != null) {
                    $re[] = $i->category;
                }
            }
        }
        return $re;
    }

    public function getImgAttribute($value)
    {
        if ($value !== null)
            return '/img/category/' . $value;
        else
            return null;
    }

    function descendants()
    {
        return $this->hasMany(Category::class, 'parent_id', 'id');
    }

    public static function scopeDefaultOrder($query)
    {
        return $query->where('hide', false)->orderBy('_lft', 'asc');
    }

    public static function scopeHide($query)
    {
        return $query->where('hide', false);
    }

    public static function scopeToTree($query)
    {
        return $query->where('parent_id', null)->where('hide', false);
    }

    public function children()
    {
        return Category::where([['parent_id', $this->id], ['hide', false]])->defaultOrder()->get();
    }

    public static function getRoot($parent_id = 0)
    {
        $res = [];
        $cats = Category_relation::where('parent_id',$parent_id)->defaultOrder()->get();
        foreach ($cats as $cat){
            $category = $cat->category;
            if (!$category) continue;
            $category->show_id = $cat->id;
            $category->child_count = $cat->child_count;
            $res[] = $category;
        }
        return $res;
    }
}