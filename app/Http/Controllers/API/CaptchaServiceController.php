<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CaptchaServiceController extends Controller
{
    public function index()
    {
        return view('index');
    }
    public function capthcaFormValidate(Request $request)
    {

        $v = Validator::make($request->all(), [
            'captcha' => 'required|captcha'
        ]);
        return response()->json($v->errors());
    }
    public function reloadCaptcha()
    {
        return response()->json(['captcha'=> captcha_img()]);
    }
}
