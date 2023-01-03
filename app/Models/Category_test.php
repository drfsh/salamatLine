<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category_test extends Model
{
    use HasFactory,SoftDeletes;
    protected $guarded = [];
    protected $table = 'category_test';

    function getParentAttribute(){
        $cat =  Category::where('id',$this->parent_id)->defaultOrder()->hide()->first();
        if ($cat)
            return $cat;
    }
    public function getChildAttribute(){
        $cat =  Category::where('id',$this->category_id)->defaultOrder()->hide()->first();
        if ($cat)
        return $cat;
    }
    public function getCategoryAttribute(){
        $cat =  Category::find($this->category_id);
        if ($cat)
        return $cat;
    }
    static public function getAllChildId($id){
        $list = [$id];
        $chile = Category_relation::where([['parent_id',$id]])->get();
        foreach ($chile as $item){
            $other = self::getAllChildId($item->id);
            foreach ($other as $v){
                $list[] = $v;
            }
        }
        return $list;
    }
    public static function scopeDefaultOrder($query)
    {
        return $query->where('hide', false)->orderBy('_lft', 'asc');
    }
    public static function getRoot($parent_id = 0)
    {
        $list = [];
        $cats = Category_relation::where('parent_id',$parent_id)->get();
        foreach ($cats as $cat){
            $c = $cat->category;
            if ($c)
            $list[] = $c;
        }
        return $list;
    }
}
