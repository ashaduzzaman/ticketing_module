<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Escalation;
use App\Models\QueryType;
use App\User;
use Validator;
Use Alert;
use Illuminate\Support\Facades\Input;

class EscalationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $escalations = Escalation::with('user','query_type')->get();
        logger($escalations);
        return view('escalations.index', get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $query_types = QueryType::all()->pluck('name', 'id');
        $users = User::all()->pluck('name', 'id');
        return view('escalations.create', get_defined_vars());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        logger($request);
        $input = Input::all();
	    $rules = [
	    	'query_type_id' => 'required',
	    	'user_id' => 'required',
	    	'email' => 'email',
	    ];
	    $messages = [
            'query_type_id.required' => 'The query type field is required.',
            'user_id.required' => 'The assign to field is required.',
            'email.email' => 'Email is not valid.',
        ];
	    
        $validator = Validator::make($input, $rules, $messages);
        if($validator->fails()){
            Alert::error('Error', 'Something wrong!');
            return redirect()->back()
                            ->withErrors($validator)
                            ->withInput();
        }

        $escalation = new Escalation;
        $escalation->query_type_id = $request->query_type_id;
        $escalation->user_id = $request->user_id;
        $escalation->mail_cc = $request->mail_cc;
        $escalation->save();

        Alert::success('Success', 'Successfully Created');

        return redirect('escalation');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Escalation $escalation)
    {
        logger($escalation);
        $query_types = QueryType::all()->pluck('name', 'id');
        $users = User::all()->pluck('name', 'id');
        return view('escalations.edit', get_defined_vars());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = Input::all();
	    $rules = [
	    	'query_type_id' => 'required',
	    	'user_id' => 'required',
	    	'email' => 'email',
	    ];
	    $messages = [
            'query_type_id.required' => 'The query type field is required.',
            'user_id.required' => 'The assign to field is required.',
            'email.email' => 'Email is not valid.',
        ];
	    
        $validator = Validator::make($input, $rules, $messages);
        if($validator->fails()){
            Alert::error('Error', 'Something wrong!');
            return redirect()->back()
                            ->withErrors($validator)
                            ->withInput();
        }

        $escalation = Escalation::find($id);
        $escalation->query_type_id = $request->query_type_id;
        $escalation->user_id = $request->user_id;
        $escalation->mail_cc = $request->mail_cc;
        $escalation->save();

        Alert::success('Success', 'Successfully Updated');

        return redirect('escalation');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            Escalation::find($id)->delete();
            return back()->with('success', 'Successfully Deleted!');
        } catch (\Illuminate\Database\QueryException $e) {
            Alert::error('Alert!!!', 'Sorry, something went wrong. You can not delete');
            return back();
        }
    }
}
