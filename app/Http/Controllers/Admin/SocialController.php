<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Social;
use Session;

class SocialController extends Controller
{
    public function __construct() {
        $this->middleware(['auth', 'isAdmin']);
    }

    public function index()
    {
        $socials = Social::orderBy('id', 'desc')->paginate(5);
        return view('admin.social.index',compact('socials'));
    }

    public function create()
    {
        return view('admin.social.create');
    }

    public function store(Request $request)
    {
        $social = new Social;
        $social->title = $request->title;
        $social->icon = $request->icon;
        $social->link = $request->link;

        if ($request->active) {
            $social->active = 1;
        }else{
            $social->active = 0;
        }

        $social->save();
        Session::flash('success', 'شبکه اجتماعی ایجاد شد');
        return redirect()->route('social.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $social = Social::find($id);
        return view('admin.social.edit', compact('social'));
    }

    public function update(Request $request, $id)
    {
        $social = Social::find($id);
        $social->title = $request->input('title');
        $social->icon = $request->input('icon');
        $social->link = $request->input('link');
        if ($request->active) {
            $social->active = 1;
        }else{
            $social->active = 0;
        }
        $social->save();
        Session::flash('success', 'تغییرات ذخیره شد');
        return redirect()->route('social.index');
    }

    public function destroy($id)
    {
        $social = Social::find($id);
        $social->delete();
        Session::flash('success', 'شبکه اجتماعی حذف شد');
        return redirect()->route('social.index');
    }
}
