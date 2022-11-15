<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NavMenu;
use Illuminate\Http\Request;
use Session;

class NavMenuController extends Controller
{
    public function index()
    {
        $menu = NavMenu::all();
        return view('admin.navMenu.index',compact('menu'));
    }

    public function create()
    {
        return view('admin.navMenu.create');
    }

    public function store(Request $request)
    {
        $menu = new NavMenu();
        $menu->name = $request->name;
        $menu->link = $request->link;
        $menu->color = $request->color;
        $menu->text_color = $request->text_color;
        $menu->icon = $request->icon;
        $menu->save();
        Session::flash('success', 'منو ایجاد شد');
        return redirect()->route('navMenu.index');
    }


    public function edit($id)
    {
        $menu = NavMenu::find($id);
        return view('admin.navMenu.edit',compact('menu'));
    }

    public function update(Request $request, $id)
    {
        $menu = NavMenu::find($id);
        $menu->name = $request->name;
        $menu->link = $request->link;
        $menu->color = $request->color;
        $menu->text_color = $request->text_color;
        $menu->icon = $request->icon;
        $menu->save();
        Session::flash('success', 'تغییرات ذخیره شد');
        return redirect()->route('navMenu.index');
    }

    public function destroy($id)
    {
        $menu = NavMenu::find($id);
        $menu->delete();
        Session::flash('success', 'شهر حذف شد');
        return redirect()->route('navMenu.index');
    }
}
