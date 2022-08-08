<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\MobileRequest;
use App\Models\User;
use Session;

class UsermobileController extends Controller
{
    public function __construct() {
        $this->middleware(['auth', 'isAdmin']);
    }

    public function create() {
        return view('admin.security.users.mobile.create');
    }

    public function store(MobileRequest $request) {
        $user = new User;
        $user->name = $request->name;
        $user->lname = $request->lname;
        $user->mobile = $request->mobile;

        $user->save();
        Session::flash('success', 'کاربر افزوده شد.');
        return redirect()->route('users.index');
    }
}
