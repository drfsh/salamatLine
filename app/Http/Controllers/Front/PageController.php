<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Models\Faq;
use App\Models\InfoPage;
use App\Models\InquiryRequest;
use App\Models\Log;
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

        $img1 = InfoPage::find(1);
        $img2 = InfoPage::find(2);
        $b1 = InfoPage::find(3);
        $b2 = InfoPage::find(4);
        $b3 = InfoPage::find(5);
        $b4 = InfoPage::find(6);
        $b5 = InfoPage::find(7);
        $users = InfoPage::where([['id','!=', 1], ['id','!=', 2], ['id','!=', 3], ['id', '!=',4],
            ['id','!=', 5], ['id','!=', 6], ['id', '!=',7],['name','!=','images']])->get();

        $images = InfoPage::where('name','images')->first();

        $data['img1'] = $img1->img;
        $data['img2'] = $img2->img;
        $data['b1'] = $b1;
        $data['b2'] = $b2;
        $data['b3'] = $b3;
        $data['b4'] = $b4;
        $data['b5'] = $b5;
        $data['users'] = $users;
        $data['images'] = json_decode($images->info);

        return view('front.page.about.main',compact('data'));
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
            'type'=>'faq'
        ]);
        $log = Log::where([['name','contact'],['for','admin']])->first();
        $log->add();
        Session::flash('success', 'پیام شما با موفقیت ارسال شد!');

        return redirect()->back();
    }
    public function contact_new(ContactRequest $request){
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

        $log = Log::where([['name','contact'],['for','admin']])->first();
        $log->add();
        Session::flash('success', 'پیام شما با موفقیت ارسال شد!');

        return redirect()->back();
    }
    public function inquiry_new(\App\Http\Requests\InquiryRequest $request){
        $office = $request->office;
        $name = $request->name;
        $email = $request->email;
        $mobile = $request->mobile;
        $products = $request->products;
        $count = $request->count;


        InquiryRequest::create([
            'office'=>$office,
            'name'=>$name,
            'email'=>$email,
            'mobile'=>$mobile,
            'products'=>$products,
            'count'=>$count,
            ]);

        $log = Log::where([['name','inquiry'],['for','admin']])->first();
        $log->add();
        Session::flash('success', 'پیام شما با موفقیت ارسال شد!');

        return redirect()->back();
    }

    public function help(){
        $list = Faq::latest()->where('active',1)->get();
        return view('front.page.help.main',compact('list'));
    }
    public function inquiry(){
        $b1 = InfoPage::find(3);
        $b2 = InfoPage::find(4);
        $b3 = InfoPage::find(5);
        $b4 = InfoPage::find(6);
        $b5 = InfoPage::find(7);

        $data['b1'] = $b1;
        $data['b2'] = $b2;
        $data['b3'] = $b3;
        $data['b4'] = $b4;
        $data['b5'] = $b5;
        $text = Page::where('title','inquiry')->first()->content;
        return view('front.page.inquiry.main',compact('data','text'));
    }
}
