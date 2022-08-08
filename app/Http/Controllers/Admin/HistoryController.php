<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class HistoryController extends Controller
{

    public function __construct() {
        $this->middleware(['auth', 'isAdmin']);
    }
	
    public function index()
    {

        $data = \OwenIt\Auditing\Models\Audit::with('user')->orderBy('created_at', 'desc')->paginate(20);
        return view('admin.history.main', compact('data'));
    }
}
