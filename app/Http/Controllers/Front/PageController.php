<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Artesaos\SEOTools\Facades\SEOTools;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\TwitterCard;
use Illuminate\Support\Str;

class PageController extends Controller
{

    public function index()
    {
        $pages = Page::where('active', true)->paginate(10);
        SEOTools::setTitle('صفحات عمومی');
        OpenGraph::addImage(route('home').'/public/img/logo.png');
        TwitterCard::setImage(route('home').'/public/img/logo.png');
        SEOTools::jsonLd()->addImage(route('home').'/public/img/logo.png');
        SEOMeta::addKeyword(['صفحات عمومی سلامت لاین', 'Salamatline Store', 'فروشگاه اینترنتی سلامت لاین']);
        // SEOMeta::setDescription($Des);
        // OpenGraph::setDescription($Des);
        // TwitterCard::addValue('description', $Des);
        TwitterCard::addValue('card', 'Summary');

        return view('front.page.index', compact('pages'));
    }

    public function main($slug){

        $page = Page::where('slug', $slug)->where('active', true)->first();

        $Des = strip_tags(Str::limit($page->content, 250));

        SEOTools::setTitle($page->title);
        if($page->image){
			OpenGraph::addImage($page->image);
			TwitterCard::setImage($page->image);
			SEOTools::jsonLd()->addImage($page->image);
		} else {
			OpenGraph::addImage(route('home').'/public/img/logo.png');
			TwitterCard::setImage(route('home').'/public/img/logo.png');
			SEOTools::jsonLd()->addImage(route('home').'/public/img/logo.png');
        }
        if($page->seo){
			SEOMeta::addKeyword($page->seo->keywords);
		} else {
			SEOMeta::addKeyword([$page->title, 'Salamatline Store', 'فروشگاه اینترنتی سلامت لاین']);
		}

		if($page->seo){
			SEOMeta::setDescription($page->seo->metadesc);
			OpenGraph::setDescription($page->seo->metadesc);
			TwitterCard::addValue('description', $page->seo->metadesc);
		} elseif($Des){
			SEOMeta::setDescription($Des);
			OpenGraph::setDescription($Des);
			TwitterCard::addValue('description', $Des);
		}
        TwitterCard::addValue('card', 'Summary');


        return view('front.page.single', compact('page'));
    }

    public function contactUs(){
        return view('front.page.contactus.main');
    }
}
