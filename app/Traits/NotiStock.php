<?php

namespace App\Traits;
use App\Models\Product;
use App\Models\Restock;
use App\Traits\Smstrait;
use Log;

trait NotiStock {

	use Smstrait;

    public function NotiStock($id,$title,$slug) {

    $list = Restock::where('product_id',$id)->with('user')->get();

    $url = route('home').'/products/'.$slug;

    foreach ($list as $item) {
    	if ($item->user->mobile) {
    		$this->Sendsms($item->user->mobile, 'ReStock', $url,null,null,$item->user->name); 
    		$item->delete();
    	}
    	
    }

    // Log::info($url);  	

    }
}