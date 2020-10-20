<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use Auth;
use Alert;
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
        $ticket = Ticket::where('id', $id)->with(['crm','crm.district','crm.district.division','crm.department','crm.query_type','crm.complain_type','crm.call_remark'])->first();
        return view('tickets.show', get_defined_vars());
    }

    public function changeStatus(Request $request,$id)
    {
        $ticket = Ticket::find($id);

        switch ($ticket->status) {
            case "NEW":
                $ticket->status = "WIP";
                if($request->comment){
                    $ticket->comment = $request->comment; 
                }
                break;
            case "WIP":
                $ticket->status = "ANSWERED";
                if($request->comment){
                    $ticket->comment = $request->comment; 
                }
                break;
            case "ANSWERED":
                $ticket->status = "CLOSED";
                if($request->comment){
                    $ticket->comment = $request->comment; 
                }
                break;
            default:
              $ticket->status = "WIP";
              if($request->comment){
                $ticket->comment = $request->comment; 
            }
        }

        $ticket->save();

        Alert::success('Success', 'Ticket Status changed successfully');

        return redirect()->route('ticket',['type'=> $ticket->status]);
    }
}
