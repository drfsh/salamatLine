<?php

namespace App\Http\Controllers\Front\Ticket;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Http\Request;
use phpseclib3\Crypt\Random;

class TicketController extends Controller
{
    public function main()
    {
        return view('profile.ticket.main');
    }

    public function getList()
    {
        $user = auth()->user();
        $data = $user->tickets;
        return response()->json($data);
    }

    public function newTicket()
    {
        return view('profile.ticket.create.main');
    }

    public function make(Request $request)
    {
        $user = auth()->user();

        $ticket = new Ticket();
        $ticket->user_id = $user->id;
        $ticket->title = $request->title;
        $ticket->status = 'waiting';
        $ticket->code = Random::string();
        $ticket->save();
        return redirect()->route('ticket', ['code' => $ticket->code, 'id' => $ticket->id]);
    }

    public function view($code,$id){

        return view('profile.ticket.view.main');
    }
}
