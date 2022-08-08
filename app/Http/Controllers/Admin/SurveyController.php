<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Survey;
use DB;

class SurveyController extends Controller
{
    public function __construct() {
        $this->middleware(['auth', 'isAdmin']);
    }

    public function index()
	{
        $data['avg_q'] = DB::table('surveys')->where('quality', '!=', null)->avg('quality');
        $data['avg_p'] = DB::table('surveys')->where('price', '!=', null)->avg('price');
        $data['avg_t'] = DB::table('surveys')->where('transport', '!=', null)->avg('transport');
        $data['avg_o'] = DB::table('surveys')->where('overall', '!=', null)->avg('overall');
        $data['survey'] = Survey::whereColumn('updated_at', '>', 'created_at')->orderBy('updated_at', 'desc')->paginate(25);
        return view('admin.survey.main', compact('data'));
    }
}
