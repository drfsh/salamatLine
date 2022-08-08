<?php

namespace App\Http\Controllers\Front\Cart;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
Use \Carbon\Carbon;
use App\Models\Holiday;

class StepThreeController extends Controller
{
	public function checkDate(){

		for($i = 1; $i < 12; ++$i) {
			$date = Carbon::now();
			$start = $date->add($i, 'day');
			$holiday = Holiday::where('day',$start->toDateString())->first();
			$day_number = Verta($start)->dayOfWeek;
			if ($day_number != 6) {
				$data[$i]['id'] = $i;
				$data[$i]['gregorian'] = $start->format('Y-m-d');
				$data[$i]['title'] = Verta($start)->format('l');
				$data[$i]['full'] = Verta($start)->format('d F Y');
				if ($holiday) {
					$data[$i]['active'] = false;
					$data[$i]['holiday'] = $holiday->title;
				}else{
					$data[$i]['active'] = true;
					$data[$i]['holiday'] = null;
				}
			}

		    
		}
		return $data;
	}
}
