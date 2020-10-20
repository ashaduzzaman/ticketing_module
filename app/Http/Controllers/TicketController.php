<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use Auth;
class TicketController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(Request $request)
    {
        $userID = Auth::id();
        $tickets = Ticket::where('assigned_id', $userID)->where('status', strtoupper($request->type))->with(['crm','crm.query_type','crm.complain_type','crm.call_remark'])->get();
        $status_for_display = $request->type;
        return view("tickets.index", get_defined_vars());
    }

    public function show($id)
    {
        $ticket = Ticket::where('id', $id)->with(['crm','crm.query_type','crm.complain_type','crm.call_remark'])->get();

        logger($ticket);
    }
}
