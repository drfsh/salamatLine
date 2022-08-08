<?php

namespace App\Http\Controllers\Admin\Invoice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Invoice;

class Factor extends Controller
{
	public function main($id){
		$invoice = Invoice::with('user','detail')->findOrFail($id);
		return view('admin.invoice.factor.main',compact('invoice'));
	}	
}
