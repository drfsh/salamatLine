<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OtherUser;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class ColleagueController extends Controller
{

    public function __construct() {
        $this->middleware(['auth', 'isAdmin']);
    }

    public function index() {
        $users = OtherUser::where('type_buy','==','0')->latest()->paginate(10);
        return view('admin.security.users.colleague.main')->with('users', $users);
    }

    public function create() {

        $roles = Role::get();
        return view('admin.security.users.colleague.create',compact('roles'));
    }

    public function store(Request $request) {
        $this->validate($request, [
            'name'=>'required|max:120',
        ]);

        $user = OtherUser::create($request->only('email', 'name', 'number','role','type_buy','price_buy'));

        return redirect()->route('colleague.index')
            ->with('flash_message',
                'User successfully added.');
    }


    public function edit($id) {
        $user = OtherUser::findOrFail($id);
        $roles = Role::get();


        return view('admin.security.users.colleague.edit', compact('user', 'roles'));

    }

    public function update(Request $request, $id) {
        $user = OtherUser::findOrFail($id);

        $this->validate($request, [
            'name'=>'required|max:120',
        ]);
        $input = $request->only('email', 'name', 'number','role','type_buy','price_buy');
        $user->fill($input)->save();


        return redirect()->route('colleague.index')
            ->with('flash_message',
                'User successfully edited.');
    }

    public function destroy($id) {
        $user = OtherUser::findOrFail($id);
        $user->delete();
        return redirect()->route('colleague.index')
            ->with('flash_message',
                'User successfully deleted.');
    }
}
