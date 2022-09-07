<?php

namespace App\Http\Controllers\Front\Profile;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\SurveyRequest;
use App\Models\Survey;
use App\Models\Invoice;
use Auth;
use Illuminate\Support\Facades\View;

class SurveyController extends Controller
{
    public function __construct(){$this->middleware('auth');
        View::share('categories',Category::defaultOrder()->toTree()->get());
    }

    public function main($id)
	{
        $survey = Survey::find($id);
        if(!$survey){
            return redirect()->route('OrderHistory')->withErrors(['این نظرسنجی وجود ندارد.']);
        }

        if($survey->updated_at->gt($survey->created_at)){
            return redirect()->route('OrderHistory')->withErrors(['قبلا این نظرسنجی را تکمیل کرده‌اید.']);
        }

        $userId = Auth::id();
        $invoice = Invoice::where('id', $survey->invoice_id)->first();

        if($userId != $invoice->user_id){
            return redirect()->route('OrderHistory')->withErrors(['این سفارش متعلق به شما نمی‌باشد.']);
        }
        return view('profile.survey.main', compact('survey'));
    }

    public function update(SurveyRequest $request, $id)
    {
        $survey = Survey::findOrFail($id);
        $survey->quality = $request->input('quality');
        $survey->price = $request->input('price');
        $survey->levels = $request->input('levels');
        $survey->transport = $request->input('transport');
        $survey->acquaint = $request->input('acquaint');
        // $input['acquaint'] = $request->input('acquaint[]');
        $survey->overall = $request->input('overall');
        $survey->content = $request->input('content');

        $survey->save();
        return redirect()->route('OrderHistory')->withErrors(['با تشکر از شما']);

    }

}
