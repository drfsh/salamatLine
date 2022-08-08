<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Codebyray\ReviewRateable\Models\Rating;
use Session;


class ReviewrateController extends Controller
{
    public function __construct() {
        $this->middleware(['auth', 'isAdmin']);
    }

    public function index()
    {
        $ratings = Rating::with('reviewrateable','author')->where('approved', '0')->latest()->paginate(25);
        return view('admin.reviews.unapprove', compact('ratings'));
    }

    public function approved()
    {
        $ratings = Rating::with('reviewrateable','author')->where('approved', '1')->latest()->paginate(25);
        return view('admin.reviews.approve', compact('ratings'));
    }

    public function ApproveRate($id){
        $rate = Rating::find($id);
        $rate->approved = 1;
        $rate->save();
        Session::flash('success', 'نظر با امتیاز  '.$rate->rating.'در صفحه محصول '.$rate->reviewrateable->title.' انتشار یافت.');
        return redirect()->back();
    }

    public function UnapproveRate($id){
        $rate = Rating::find($id);
        $rate->approved = 0;
        $rate->save();
        Session::flash('success', 'انتشار امتیاز لغو شد.');
        return redirect()->back();
    }
}
