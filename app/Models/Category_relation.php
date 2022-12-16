<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category_relation extends Model
{
    use HasFactory;
    protected $guarded = [];


    function getParentAttribute(){
        $cat =  Category::where('id',$this->parent_id)->defaultOrder()->hide()->first();
        if ($cat)
            return $cat;
    }
    public function getChildAttribute(){
        $cat =  Category::where('id',$this->child_id)->defaultOrder()->hide()->first();
        if ($cat)
        return $cat;
    }
}
