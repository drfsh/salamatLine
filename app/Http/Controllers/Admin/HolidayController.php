<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Holiday;
use Session;
// use Log;
// use Carbon\Carbon;

class HolidayController extends Controller
{
    public function __construct() {
        $this->middleware(['auth', 'isAdmin']);
    }

    public function index()
    {
        $days = Holiday::latest()->paginate(10);
        return view('admin.holiday.index', compact('days'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $day = new Holiday;
        $day->title = $request->title;
        $day->day = $request->day;
        $day->save();
        // Log::info($request->day);
        Session::flash('success', 'روز تعطیل ایجاد شد');
        return redirect()->route('holiday.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $holiday = Holiday::find($id);
        return view('admin.holiday.edit', compact('holiday'));
    }

    public function update(Request $request, $id)
    {
        $holiday = Holiday::find($id);
        $holiday->title = $request->input('title');
        $holiday->day = $request->day;

        $holiday->save();
        Session::flash('success', 'تغییرات ایجاد شد');
        return redirect()->route('holiday.index');
    }

    public function destroy($id)
    {
        $day = Holiday::find($id);
        $day->delete();

        Session::flash('success', 'روز حذف شد');
        return redirect()->route('holiday.index');
    }
}
