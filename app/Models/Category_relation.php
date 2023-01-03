<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category_relation extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    protected $appends = [
        'child_count',
    ];


    public function getChildCountAttribute()
    {
        return Category_relation::where('parent_id', $this->id)->count();
    }

    function getParentAttribute()
    {
        $cat = Category::where('id', $this->parent_id)->defaultOrder()->hide()->first();
        if ($cat)
            return $cat;
    }


    public static function scopeDefaultOrder($query)
    {
        return $query->where('hide', false)->orderBy('sort', 'desc');
    }

    public static function scopeLastOrder($query)
    {
        return $query->where('hide', false)->orderBy('sort', 'asc');
    }

    public function getChildrenAttribute()
    {
        return Category_relation::where('parent_id',$this->id)->defaultOrder()->get();
    }

    public function getCategoryAttribute()
    {
        $cat = Category::find($this->category_id);
        if ($cat)
        {
            $cat->show_id = $this->id;
            return $cat;
        }
    }

    static public function getAllChildId($id, $cat_id = true)
    {
        if ($cat_id)
            $chile = Category_relation::where([['category_id', $id]])->defaultOrder()->get();
        else
            $chile = Category_relation::where([['parent_id', $id]])->defaultOrder()->get();
        $list = [];
        foreach ($chile as $item) {
            $list[] = $item->category_id;
            $other = self::getAllChildId($item->id,false);
            foreach ($other as $v) {
                $list[] = $v;
            }
        }
        return $list;
    }


    public static function getRoot($parent_id = 0)
    {
        $list = [];
        $cats = Category_relation::where('parent_id', $parent_id)->defaultOrder()->get();
        foreach ($cats as $cat) {
            $c = $cat->category;
            if ($c)
                $list[] = $c;
        }
        return $list;
    }

    public function copy($to){

        $new = Category_relation::create([
            'category_id'=>$this->category_id,
            'parent_id'=>$to
        ]);
        $children = $this->children;
        foreach ($children as $child){
            $child->copy($new->id);
        }

    }

    public function deleteAll(){
        $children = $this->children;
        foreach ($children as $child){
            $child->deleteAll();
        }
        $this->delete();
    }

    public function up(){
        $top = Category_relation::where([['parent_id',$this->parent_id],['sort','>',$this->sort]])->lastOrder()->first();
        if (is_null($top)) return;
        $topSort = $top->sort;
        $bottomSort = $this->sort;
        $this->sort = $topSort;
        $top->sort = $bottomSort;
        $top->save();
        $this->save();
    }
    public function down(){
        $bottom = Category_relation::where([['parent_id',$this->parent_id],['sort','<',$this->sort]])->defaultOrder()->first();
        if (is_null($bottom)) return;
        $topSort = $this->sort;
        $bottomSort = $bottom->sort;
        $this->sort = $bottomSort;
        $bottom->sort = $topSort;
        $bottom->save();
        $this->save();
    }
}
