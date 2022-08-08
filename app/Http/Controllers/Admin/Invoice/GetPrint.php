<?php

namespace App\Http\Controllers\Admin\Invoice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Invoice;

class GetPrint extends Controller
{
	public function main($id){
		$invoice = Invoice::with('user')->findOrFail($id);
		return view('admin.invoice.print',compact('invoice'));
	}
}
