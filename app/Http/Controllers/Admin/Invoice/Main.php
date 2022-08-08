<?php

namespace App\Http\Controllers\Admin\Invoice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Invoice;
use App\Filters\InvoiceFilter;


class Main extends Controller
{
    public function __construct() {
        $this->middleware(['auth', 'isAdmin']);
    }

    public function index()
    {
        return view('admin.invoice.main');
    }

    public function GetInvoice(InvoiceFilter $filters,Request $request){

        if (!$request->per_page || !$request->page || $request->per_page > 50) {
            return 'invalid params';
        }

        $invoices = Invoice::with('user','coupon','address.city.province','creator')
        ->orderBy('pay_date', 'Desc')
        ->filter($filters);
        return $invoices;
    }
}
