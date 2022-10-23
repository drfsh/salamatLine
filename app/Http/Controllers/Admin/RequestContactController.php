<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Log;
use App\Models\RequestContact;
use Illuminate\Http\Request;

class RequestContactController extends Controller
{
    public function index(){
        $list = RequestContact::latest()->paginate(10);
        Log::clear('contact');
        return view('admin.request_contact.main',compact('list'));
    }


    public function destroy($id) {
        $permission = RequestContact::findOrFail($id);
        $permission->delete();
        return redirect()->route('requestContact.index');
    }
}
