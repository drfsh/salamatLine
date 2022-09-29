<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RequestContact;
use Illuminate\Http\Request;

class RequestContactController extends Controller
{
    public function index(){
        $list = RequestContact::latest()->paginate(10);
        return view('admin.request_contact.main',compact('list'));
    }
}
