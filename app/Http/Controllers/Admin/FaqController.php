<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Faq;
use Illuminate\Http\Request;
use Session;

class FaqController extends Controller
{

    public function index(){
        $list = Faq::latest()->get();
        return view('admin.faq.main',compact('list'));
    }

    public function create(){


        return view('admin.faq.create');
    }

    public function store(Request $request){

        $faq = new Faq();
        $faq->title = $request->title;
        $faq->body = $request->body;
        $faq->active = $request->active;
        $faq->save();

        Session::flash('success', 'سوال ایجاد شد');
        return redirect()->route('faq.index');
    }

    public function edit($id)
    {
        $faq = Faq::find($id);
        return view('admin.faq.edit',compact('faq'));
    }


    public function update(Request $request,$id){

        $faq = Faq::find($id);
        $faq->title = $request->title;
        $faq->body = $request->body;
        if ($request->active=='on')
        $faq->active = true;
        else
            $faq->active = false;
        $faq->save();

        Session::flash('success', 'سوال ویرایش شد');
        return redirect()->route('faq.index');
    }


    public function destroy($id)
    {
        $city = Faq::find($id);
        $city->delete();
        Session::flash('success', 'سوال حذف شد');
        return redirect()->route('faq.index');
    }
}
