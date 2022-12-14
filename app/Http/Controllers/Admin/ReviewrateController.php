<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Log;
use App\Models\Product;
use Illuminate\Http\Request;
use Codebyray\ReviewRateable\Models\Rating;
use Session;


class ReviewrateController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'isAdmin']);
    }

    public function index()
    {
        $ratings = Rating::with('reviewrateable', 'author')->where('approved', '0')->latest()->paginate(25);
        foreach ($ratings as $item) {
            $item->created_at = Verta($item->created_at)->format('Y/m/d H:i:s');
            $item['reviewrateable2'] = Product::find($item['reviewrateable_id']);
        }
        Log::clear('review');
        return view('admin.reviews.unapprove', compact('ratings'));
    }

    public function approved()
    {
        $ratings = Rating::with('reviewrateable', 'author')->where('approved', '1')->latest()->paginate(25);
        foreach ($ratings as $item) {
            $item->created_at = Verta($item->created_at)->format('Y/m/d H:i:s');
            $item['reviewrateable2'] = Product::find($item['reviewrateable_id']);
        }
        return view('admin.reviews.approve', compact('ratings'));
    }

    public function ApproveRate($id)
    {
        $rate = Rating::find($id);
        $rate->approved = 1;
        $rate->save();
        $rate['reviewrateable2'] = Product::find($rate['reviewrateable_id']);
        Session::flash('success', 'نظر با امتیاز  ' . $rate->rating . 'در صفحه محصول ' . $rate->reviewrateable2->title . ' انتشار یافت.');
        return redirect()->back();
    }

    public function UnapproveRate($id)
    {
        $rate = Rating::find($id);
        $rate->approved = 0;
        $rate->save();
        Session::flash('success', 'انتشار امتیاز لغو شد.');
        return redirect()->back();
    }

    public function set_replay($id){
        $ratings = Rating::find($id);
        if ($ratings!==null)
            $ratings->update([
                'replay'=>request()->body,
            ]);
        return response()->json($ratings);
    }
}
