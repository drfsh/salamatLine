<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OtherUser;
use App\Traits\Smstrait;
use Illuminate\Http\Request;
use App\Models\Role;
use Auth;
use Session;

class PersonUserController extends Controller
{
    use Smstrait;

    public function __construct() {
        $this->middleware(['auth', 'isAdmin']);
    }

    public function index() {
        $users = OtherUser::where('type_buy','!=','0')->latest()->paginate(10);
        return view('admin.security.users.person.person')->with('users', $users);
    }

    public function create() {

        $roles = Role::get();
        return view('admin.security.users.person.create',compact('roles'));
    }

    public function store(Request $request) {
        $this->validate($request, [
            'name'=>'required|max:120',
        ]);

        $user = OtherUser::create($request->only('email', 'name', 'number','role','type_buy','price_buy'));

        $this->Sendsms($user->number,'Welcome','Salamatline.com',null,null,$user->name);
        return redirect()->route('person.index')
            ->with('flash_message',
                'User successfully added.');
    }


    public function edit($id) {
        $user = OtherUser::findOrFail($id);
        $roles = Role::get();


        return view('admin.security.users.person.edit', compact('user', 'roles'));

    }

    public function update(Request $request, $id) {
        $user = OtherUser::findOrFail($id);

        $this->validate($request, [
            'name'=>'required|max:120',
        ]);
        $input = $request->only('email', 'name', 'number','role','type_buy','price_buy');
        $user->fill($input)->save();


        return redirect()->route('person.index')
            ->with('flash_message',
                'User successfully edited.');
    }

    public function destroy($id) {
        $user = OtherUser::findOrFail($id);
        $user->delete();
        return redirect()->route('person.index')
            ->with('flash_message',
                'User successfully deleted.');
    }
}
