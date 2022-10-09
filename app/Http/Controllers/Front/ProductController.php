<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Log;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Feature;
Use Redirect;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;
use Artesaos\SEOTools\Facades\SEOTools;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;
use Artesaos\SEOTools\Facades\JsonLd;
use App\Http\Requests\Productrate;
use App\Models\Invoice;
use Auth;
use Session;
use App\Models\Category;

class ProductController extends Controller
{
	use SEOToolsTrait;
	public function main($slug)
	{


        $data['product'] = Product::published()->where('id',$slug)->with('multiprice','multifeature','feature','photos','brand','country','inventory','discount','collection')->first();

        if ($data['product']===null)
        $data['product'] = Product::published()->where('slug',$slug)->with('multiprice','multifeature','feature','photos','brand','country','inventory','discount','collection')->first();
		$data['collection'] =  [];


        foreach($data['product']->collection as $item){
			$data['collection'][$item->id] = $item;
			$data['collection'][$item->id]['products'] = $item->products()->where('active',1)->inRandomOrder()->limit(5)->get();
		}

		// return $relate;

		if (!$data['product']) {
			return Redirect::route('home');
		}

		$avgRate = $data['product']->averageRating(2, true);
        if ($avgRate!==null)
		$data['rate_percent'] = $avgRate[0]*20;
        else
            $data['rate_percent'] = 0;
        $data['countRate'] = $data['product']->getApprovedRatings($data['product']->id)->count();

        $data['product']->categories;

		views($data['product'])->cooldown(1440)->record();
		$this->seo()->setTitle($data['product']->title);

		$data['favorited'] = $data['product']->isFavorited();






		$categoryId = $data['product']->categories->pluck('id')->toArray();
		$sub_cat_id  =  app('rinvex.categories.category')->withDepth()->having('depth', '=', 2)->find($categoryId)->pluck('id')->toArray();
		$data['related'] = Product::withAnyCategories($sub_cat_id)->where('id','!=',$data['product']->id)->inRandomOrder()->limit(10)->get();

		if ($data['related']) {
			$sub_cat_id  =  app('rinvex.categories.category')->withDepth()->having('depth', '=', 1)->find($categoryId)->pluck('id')->toArray();
			$data['related'] = Product::withAnyCategories($sub_cat_id)->where('id','!=',$data['product']->id)->inRandomOrder()->limit(10)->get();
		}

		if (!$data['related']) {
			$sub_cat_id  =  app('rinvex.categories.category')->withDepth()->having('depth', '=', 0)->find($categoryId)->pluck('id')->toArray();
			$data['related'] = Product::withAnyCategories($sub_cat_id)->where('id','!=',$data['product']->id)->inRandomOrder()->limit(10)->get();
		}

		// SEO
		if($data['product']->subtitle){
			$SeoTitle = $data['product']->title.' '.$data['product']->subtitle;
		}else{
			$SeoTitle = $data['product']->title;
		}
		SEOTools::setTitle($SeoTitle);
		if ($data['product']->content) {
			$Des = strip_tags($data['product']->content);
		}else{
			$Des = $data['product']->title.' '.$data['product']->subtitle;
		}
		if($data['product']->seo){
			SEOMeta::addKeyword($data['product']->seo->keywords);
			SEOMeta::setDescription($data['product']->seo->metadesc);
			OpenGraph::setDescription($data['product']->seo->metadesc);
			TwitterCard::addValue('description', $data['product']->seo->metadesc);
		} else {
			SEOMeta::addKeyword([$data['product']->title.' '.$data['product']->subtitle, 'Salamatline Shop', 'فروشگاه اینترنتی سلامت لاین']);
			SEOMeta::setDescription($Des);
			OpenGraph::setDescription($Des);
			TwitterCard::addValue('description', $Des);
		}
		SEOTools::jsonLd()->addImage($data['product']->large);
		OpenGraph::addImage($data['product']->large);
		TwitterCard::setImage($data['product']->large);
		TwitterCard::addValue('card', 'product');
		JsonLd::setType('Product');
		JsonLd::setTitle($SeoTitle);
		JsonLd::setDescription($Des);
		JsonLd::addValue('sku', 'SL-'.$data['product']->id);
		if ($data['product']->brand_id != null) {
			JsonLd::addValue('brand', $data['product']->brand->title);
		}
		// return $data;


        $data['torob']['product_price'] = null;
        $data['torob']['availability'] = 'instock';

        if (!$data['product']->active) {
        	$data['torob']['availability'] = 'outofstock';
        }

        if ($data['product']['multiprice']->isEmpty()) {
	        $data['torob']['product_price'] = $data['product']->price/10;

        }else{
            $data['torob']['product_price'] = $data['product']['multiprice'][0]['price']/10;
        }

		return view('front.product.main.main',compact('data'));

	}

	public function review(Productrate $request, $slug){
		$product = Product::published()->where('slug', $slug)->first();
		$user = Auth::user();
		$buyer = Invoice::where('user_id', $user->id)
		->where('situation','!=','unpaid')
		->join('orders', 'invoices.id', 'orders.invoice_id')
		->where('product_id', $product->id)
		->get();
		if (Auth::check()){
			if($buyer->isEmpty()){
				Session::flash('reviewsuccess', 'شما این محصول را در این فروشگاه خریداری نکرده اید و امکان ارسال نظر ندارید');
				return redirect()->back();
			}else{
				$rating = $product->rating([
					'title' => 1,
					'body' => $request->body,
					'customer_service_rating' => null,
					'quality_rating' => null,
					'friendly_rating' => null,
					'pricing_rating' => null,
					'rating' => $request->rating,
					'recommend' => $request->recommend,
					'approved' => false,
				], $user);
                $log = Log::where([['name','review'],['for','admin']])->first();
                $log->add();
				Session::flash('reviewsuccess', 'با تشکر از شما، دیدگاه شما پس از بررسی منتشر خواهد شد.');
				return redirect()->back();
			}
        }else{
            Session::flash('success', 'جهت ارسال نظرات خود عضو شوید.');
        	return redirect()->back();
        }
    }
}
