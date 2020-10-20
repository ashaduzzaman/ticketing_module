<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
// use App\Models\Option;
use App\Models\Department;
use App\Models\District;
use App\Models\CallRemark;
use App\Models\ComplainType;
use App\Models\QueryType;
use App\Models\Escalation;
use App\Models\Ticket;
use App\Models\Crm;
Use Alert;

class CrmController extends Controller
{
    public function create(Request $request)
    {
        $departments = Department::orderBy('name', 'asc')->pluck('name', 'id');
        $districts = District::orderBy('name', 'asc')->pluck('name', 'id');
        $query_types = QueryType::orderBy('name', 'asc')->pluck('name', 'id');
        $complain_types = ComplainType::orderBy('name', 'asc')->pluck('name', 'id');
        $call_remarks = CallRemark::orderBy('name', 'asc')->pluck('name', 'id');
        $phone_number = substr($request->phone_number, -11);
        $phoneNumber = $phone_number;
        $agent = $request->agent;

        $crmLast = Crm::whereIn('customer_contact', [substr($request->phone_number, -11), substr($request->phone_number, -10)])->orderBy('id', 'desc')->first();

        return view('crms.create', compact('districts','departments', 'phoneNumber', 'agent', 'crmLast', 'query_types', 'complain_types', 'call_remarks'));
    }

    public function getDistrict(Request $request)
    {   
        $districts = District::where('division_id', $request->division_id)->pluck('name', 'id');
        return response()->json($districts);
    }

    public function store(Request $request)
    {
        if($request->raiseTicket == 'yes')
        {
            $escalation = Escalation::where('query_type_id', $request->query_type_id)->first();
            $crm = new Crm;
            $crm->customer_contact = $request->customer_contact;
            $crm->agent_name = $request->agent_name;
            $crm->customer_name = $request->customer_name;
            $crm->district_id = $request->district_id;
            $crm->address = $request->address;
            $crm->profession = $request->profession;
            $crm->query_type_id = $request->query_type_id;
            $crm->department_id = $request->department_id;
            $crm->complain_type_id = $request->complain_type_id;
            $crm->call_remark_id = $request->call_remark_id;
            $crm->verbatim = $request->verbatim;        
            $crm->save();

            $ticket = new Ticket;
            $ticket->crm_id = $crm->id;
            $ticket->assigned_id = $escalation->user_id;
            $ticket->status = 'NEW';

            $ticket->save();

            return redirect()->back()->with('success','CRM & Ticket saved successfully!');
        }else {
            $crm = new Crm;
            $crm->customer_contact = $request->customer_contact;
            $crm->agent_name = $request->agent_name;
            $crm->customer_name = $request->customer_name;
            $crm->district_id = $request->district_id;
            $crm->address = $request->address;
            $crm->profession = $request->profession;
            $crm->query_type_id = $request->query_type_id;
            $crm->department_id = $request->department_id;
            $crm->complain_type_id = $request->complain_type_id;
            $crm->call_remark_id = $request->call_remark_id;
            $crm->verbatim = $request->verbatim;        
            $crm->save();
            return redirect()->back()->with('success','CRM saved successfully!');
        }
    }
}
