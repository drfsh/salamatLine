<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Category_relation;
use App\Models\Category_test;
use App\Models\Country;
use Illuminate\Support\Facades\DB;
use Kavenegar;

class MoreController extends Controller
{
    public function country()
    {
        $data = Country::whereHas('product')->whereNotNull('image')->get();
        return response()->json($data);
    }

    private function getParent($id = null)
    {
        $list = [];
        if ($id == null)
            $cats = Category_test::all();
        else
            $cats = Category_test::where('child_id', $id)->get();

        if (!is_null($cats) && sizeof($cats) > 0) {
            foreach ($cats as $cat) {
                $res = $this->getParent($cat->parent_id);
                if (is_integer($res)) {
                    if (!in_array($res, $list)) {
                        $c = Category::find($res);
                        if ($c)
                            $list[] = $res;
                    }
                };
            }
        } else {
            return $id;
        }
        return $list;
    }

    private function getChild($parent)
    {
        $cats = Category_test::where('parent_id', $parent)->pluck('child_id');
        return $cats;
    }

    public function test()
    {
        //0
        $last = $this->getParent();
        $children = [];
        foreach ($last as $l) {
            $parents = $this->getChild($l);
            $children[$l] = [];
            foreach ($parents as $b) {
                $parents2 = $this->getChild($b);
                $children[$l][$b] = [];
                foreach ($parents2 as $c) {
                    $parents3 = $this->getChild($c);
                    $children[$l][$b][$c] = [];
                    foreach ($parents3 as $d) {
                        $parents4 = $this->getChild($d);
                        $children[$l][$b][$c][$d] = [];
                        foreach ($parents4 as $e) {
                            $children[$l][$b][$c][$d][$e] = [];
                        }
                    }
                }
            }
        }
        $c = 0;
        foreach ($children as $key0 => $child0){
            $c++;
            $cat0 = $this->createCat($key0,0,$c);
            $c1 = 0;
            foreach ($child0 as $key1 => $child1){
                $c1++;
                $cat1 = $this->createCat($key1,$cat0->id,$c1);
                $c2 = 0;
                foreach ($child1 as $key2 => $child2){
                    $c2++;
                    $cat2 = $this->createCat($key2,$cat1->id,$c2);
                    $c3 = 0;
                    foreach ($child2 as $key3 => $child3){
                        $c3++;
                        $cat3 = $this->createCat($key3,$cat2->id,$c3);
                        $c4 = 0;
                        foreach ($child3 as $key4 => $child4){
                            $c4++;
                            $cat4 = $this->createCat($key4,$cat3->id,$c4);
                            $c5 = 0;
                            foreach ($child4 as $key5 => $child5){
                                $c5++;
                                $this->createCat($key5,$cat4->id,$c5);
                            }
                        }
                    }
                }
            }
        }


        return $children;
    }

    private function createCat($cat,$parent,$lft){
        $a = Category_relation::create([
            'category_id' => $cat,
            'parent_id' => $parent,
            'sort' => $lft
        ]);
        return $a;
    }
}
