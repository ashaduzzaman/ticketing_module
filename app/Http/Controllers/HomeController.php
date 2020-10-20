<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $answered = 0;
        $new = 0;
        $wip = 0;
        $closed = 0;

        $ticket_counts = Ticket::selectRaw('count(id) as id, status')->groupBy('status')->get();
        logger($ticket_counts);
        foreach($ticket_counts as $ticket_count){
            switch($ticket_count->status){
                case 'NEW':
                    $new = $ticket_count->id;
                    break;
                case 'WIP':
                    $wip = $ticket_count->id;
                    break;
                case 'ANSWERED':
                    $answered = $ticket_count->id;
                    break;
                default:
                    $closed = $ticket_count->id;
            }
        }

        logger($answered);
        return view('home', get_defined_vars());
    }
}
