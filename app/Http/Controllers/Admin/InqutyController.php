<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\InquiryRequest;
use App\Models\Log;
use App\Models\Page;
use Illuminate\Http\Request;
use \Session;

class InqutyController extends Controller
{
    public function index()
    {
        $list = InquiryRequest::orderBy('id', 'desc')->paginate(15);
        $text = Page::where('title','inquiry')->first()->content;
        Log::clear('inquiry');
        return view('admin.request_inquiry.main',compact('list','text'));
    }

    public function destroy($id)
    {
        $city = InquiryRequest::find($id);
        $city->delete();
        Session::flash('success', 'درخواست حذف شد');
        return redirect()->route('inquirySale.index');
    }


    public function changeText(Request $request)
    {
        $page = Page::where('title','inquiry')->first();
        $page->content = $request->text;
        $page->save();
        return redirect()->route('inquirySale.index');
    }


}
