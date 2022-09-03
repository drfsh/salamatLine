<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Restock;

class ReStockController extends Controller
{

    public function __construct() {
        $this->middleware(['auth', 'isAdmin']);
    }

    public function main() {
    	$data['total'] = Restock::count();
    	$data['total_notified'] = Restock::onlyTrashed()->count();
    	$data['list'] = Restock::with('user','product')->paginate(10);

        return response()->json($data);
        return view('admin.restock.main.main',compact('data'));
    }    


    public function notified() {
    	$data['list'] = Restock::onlyTrashed()->with('user','product')->paginate(10);
        return view('admin.restock.notified.main',compact('data'));
    }   

}
