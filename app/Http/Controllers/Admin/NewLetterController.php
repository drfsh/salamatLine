<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Log;
use App\Models\Newsletter;
use App\Models\Restock;
use Illuminate\Http\Request;

class NewLetterController extends Controller
{
    public function __construct() {
        $this->middleware(['auth', 'isAdmin']);
    }

    public function index() {
        $emails = Newsletter::latest()->paginate(10);
        Log::clear("emails");
        return view('admin.newsletter.main',compact('emails'));
    }

    public function create(){
        return view('admin.newsletter.create');
    }

    public function store(Request $request) {
        $this->validate($request, [
            'title'=>'required|max:120',
        ]);



        return redirect()->route('newsletter.index')
            ->with('flash_message',
                'User successfully added.');
    }

    public function destroy($id) {
        $permission = Newsletter::findOrFail($id);
        $permission->delete();
        return redirect()->route('newsletter.index');
    }

    public function emails(){
        $emails = Newsletter::latest()->get();
        return response()->json($emails);
    }
}
