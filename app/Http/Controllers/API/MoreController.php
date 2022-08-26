<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Country;
use Illuminate\Http\Request;

class MoreController extends Controller
{
    public function country(){
        $data = Country::whereHas('product')->whereNotNull('image')->get();
        return response()->json($data);
    }
}
