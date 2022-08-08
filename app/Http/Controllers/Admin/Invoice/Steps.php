<?php

namespace App\Http\Controllers\Admin\Invoice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Invoice;
use Carbon\Carbon;
use App\Traits\Smstrait;
use Log;

class Steps extends Controller
{
	use Smstrait;

	public function ChangePaid($id){

		$invoice = Invoice::with('user')->findOrFail($id);

		if ($invoice->situation == 'paid') {
			$invoice->situation = 'production';
			$invoice->production_date = Carbon::now()->toDateTimeString();
			$invoice->save();

			if ($invoice->user->mobile && $invoice->pay_num) {
				$this->Sendsms($invoice->user->mobile, 'ProductionStage', $invoice->pay_num,null,null,$invoice->user->name); 
			}

		} 
		return 'okey';

	}

	public function ChangeProducing($id){
		$invoice = Invoice::with('user')->findOrFail($id);
	if ($invoice->situation =='production') {
		$invoice->situation = 'sending';
		$invoice->getready_date = Carbon::now()->toDateTimeString();
		$invoice->save();

        if ($invoice->user->mobile && $invoice->pay_num) {
            $this->Sendsms($invoice->user->mobile, 'PreparationStage', $invoice->pay_num,null,null,$invoice->user->name);
        }

	}
	return 'okey';		
	}

	public function ChangeSending(Request $request,$id){
        $code = $request->code;
        $method = $request->method;		
		$invoice = Invoice::with('user')->findOrFail($id);
		if ($invoice->situation =='sending') {
			$invoice->situation = 'arrived';
			$invoice->send_date = Carbon::now()->toDateTimeString();
			$invoice->save();

	        if ($invoice->user->mobile && $invoice->pay_num) {
	            if ($code && $method) {
	                $this->Sendsms($invoice->user->mobile, 'SendStage2', $invoice->pay_num,$code,$method,$invoice->user->name);
	            }else{
	                $this->Sendsms($invoice->user->mobile, 'SendStage', $invoice->pay_num,null,null,$invoice->user->name);
	            }
	        }

		}

	// if ($invoice->user->mobile & $invoice->pay_num) {
	//     if ($code && $method) {
	//         $this->Sendsms($invoice->user->mobile, 'SendStage2', $invoice->pay_num,$code,$method,$invoice->user->name);
	//     }else{
	//         $this->Sendsms($invoice->user->mobile, 'SendStage', $invoice->pay_num,null,null,$invoice->user->name);
	//     }
	// }
	return 'okey';
	}

}
