<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Log;
use Illuminate\Http\Request;

use App\Models\User;
use Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Session;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth', 'isAdmin']);
    }


    public function index()
    {
        $users = User::latest()->paginate(10);
        Log::clear('users');
        return view('admin.security.users.main.index')->with('users', $users);
    }


    public function create()
    {
        $roles = Role::get();
        return view('admin.security.users.create', ['roles' => $roles]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:120',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed'
        ]);

        $user = User::create($request->only('email', 'name', 'password'));
        $roles = $request['roles'];
        if (isset($roles)) {

            foreach ($roles as $role) {
                $role_r = Role::where('id', '=', $role)->firstOrFail();
                $user->assignRole($role_r);
            }
        }
        return redirect()->route('users.index')
            ->with('flash_message',
                'User successfully added.');
    }

    public function show($id)
    {
        return redirect('users');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::get();

        return view('admin.security.users.edit', compact('user', 'roles'));

    }


    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $this->validate($request, [
            'name' => 'required|max:120',
            'email' => 'required|email|unique:users,email,' . $id,
            // 'password'=>'required|min:6|confirmed'
        ]);
        $input = $request->only(['name', 'email']);
        $roles = $request['roles'];
        $user->fill($input)->save();

        if (Auth::user()->hasRole('SuperAdmin'))
            if (isset($roles)) {
                $user->roles()->sync($roles);
            } else {
                $user->roles()->detach();
            }
        return redirect()->route('users.index')
            ->with('flash_message',
                'User successfully edited.');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('users.index')
            ->with('flash_message',
                'User successfully deleted.');
    }

    public function admin()
    {
        $users = User::role('Admin')->latest()->paginate(10);
        return view('admin.security.users.admin.admin')->with('users', $users);
    }
}