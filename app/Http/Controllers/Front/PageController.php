<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Models\Faq;
use App\Models\Page;
use App\Models\RequestContact;
use Artesaos\SEOTools\Facades\SEOTools;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\TwitterCard;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Session;

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
    public function about(){
        return view('front.page.about.main');
    }
    public function faq(){
        $list = Faq::latest()->where('active',1)->get();
        return view('front.page.faq.main',compact('list'));
    }
    public function faq_new(ContactRequest $request){
        $name = $request->name;
        $mobile = $request->mobile;
        $email = $request->email;
        $title = $request->title;
        $body = $request->body;


        RequestContact::create([
            'name'=>$name,
            'mobile'=>$mobile,
            'email'=>$email,
            'title'=>$title,
            'body'=>$body,
        ]);

        Session::flash('success', 'پیام شما با موفقیت ارسال شد!');

        return redirect()->back();
    }

    public function help(){
        $list = Faq::latest()->where('active',1)->get();
        return view('front.page.help.main',compact('list'));
    }
}
