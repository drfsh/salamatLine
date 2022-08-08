<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Address;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function __construct() {
        $this->middleware(['auth', 'isAdmin']);
    }

    public function index()
    {
        $address = Address::withTrashed()->orderBy('id', 'desc')->paginate(30);
        return view('admin.address.index', compact('address'));
    }

}
