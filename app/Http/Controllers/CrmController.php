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
use App\Models\Crm;
Use Alert;

class CrmController extends Controller
{
    public function create(Request $request)
    {
        logger($request);
        // $productModelList  = Option::where('select_id', 2)->where('status', 'Active')->pluck('name', 'name');
        // $sourOfPurList  = Option::where('select_id', 3)->where('status', 'Active')->pluck('name', 'name');
        // $usagePurList  = Option::where('select_id', 4)->where('status', 'Active')->pluck('name', 'name');
        // $queryTypeList  = Option::where('select_id', 5)->where('status', 'Active')->pluck('name', 'name');
        // $callRemarksList  = Option::where('select_id', 6)->where('status', 'Active')->pluck('name', 'name');
        // $sourOfCallList  = Option::where('select_id', 7)->where('status', 'Active')->pluck('name', 'name');
        // $createTicketList  = Option::where('select_id', 8)->where('status', 'Active')->pluck('name', 'name');
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
        logger(getDistrict);
        return response()->json($districts);
    }

    public function store(Request $request)
    {

        logger($request);
        // $crm = new Crm;
        // $crm->customer_contact = $request->customer_contact;
        // $crm->agent_name = $request->agent_name;
        // $crm->customer_name = $request->customer_name;
        // // $crm->division_id = $request->division_id;
        // $crm->district_id = $request->district_id;
        // $crm->address = $request->address;
        // $crm->profession = $request->profession;
        // $crm->query_type = $request->queryType;
        // $crm->department_id = $request->department_id;
        // $crm->complain_type = $request->complainType;
        // $crm->remarks = $request->remarks;
        // $crm->verbatim = $request->verbatim;
        
        
        // $crm->save();
        // // flash()->success($request->customer_contact.' information created successfully');
        // return redirect()->back()->with('success','Information created successfully!');
    }
}
