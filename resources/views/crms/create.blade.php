<!DOCTYPE html>
<html>
<head>
  <title>CRM</title>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://use.fontawesome.com/3c93f095a2.js"></script>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script> -->
    <style>
      .hide{
        display: none;
      }
    </style>
</head>
<body>
  <div class="container">
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>	
            <strong>{{ $message }}</strong>
        </div>
    @endif
    <div class="card bg-dark text-white" style="height: 600px;">
        <div class="card-header text-center">
          CRM: Phone No:<mark>{{ $phoneNumber }}</mark> & Agent: <mark>{{ $agent }}</mark>
        </div>
        <div class="card-body">
          <form action="/crm/store" method="post">
            @csrf
              <input type="hidden" class="form-control" id="" placeholder="" name="agent_name" value="<?php echo $agent; ?>" required>
              <input type="hidden" class="form-control" id="" placeholder="" name="customer_contact" value="<?php echo $phoneNumber; ?>" required>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="Customer_name">Name</label>
                  <input type="text" class="form-control" id="customer_name" name="customer_name" value="<?php if(isset($customer_name))echo $customer_name; ?>" placeholder="Name" required>
                </div>
                <div class="form-group col-md-6 {{ $errors->has('name') ? 'has-error' : ''}}">
                    {{ Form::label('District Name') }}
                    {{ Form::select('district_id', $districts, null, array('class'=>'form-control', 'placeholder'=>'Please select ...', 'required')) }}
                </div>
              </div>
              <div class="form-group">
                <label for="address">Address</label>
                <input type="text" class="form-control" id="address" name="address" value="<?php if(isset($address))echo $address; ?>" placeholder="Address" required>
              </div>
              <div class="form-row">
                <div class="form-group col-md-3">
                  <label for="profession">Profession</label>
                  <input type="text" class="form-control" id="profession" name="profession" value="<?php if(isset($profession))echo $profession; ?>" placeholder="Profession" required>
                </div>
                <div class="form-group col-md-3">
                
                    {{ Form::label('Query Type') }}
                    {{ Form::select('query_type_id', $query_types, null, array('class'=>'form-control', 'placeholder'=>'Please select ...', 'required')) }}
                </div>
                <div class="form-group col-md-3">
                    {{ Form::label('Department Name') }}
                    {{ Form::select('department_id', $departments, null, array('class'=>'form-control', 'placeholder'=>'Please select ...', 'required')) }}
                </div>
                <div class="form-group col-md-3">
                  {{ Form::label('Complain Type') }}
                  {{ Form::select('complain_type_id', $complain_types, null, array('class'=>'form-control', 'placeholder'=>'Please select ...', 'required')) }}
                </div>
              </div>
              
              <div class="form-row">
                <div class="form-group col-md-6">
                  {{ Form::label('Call Remarks') }}
                  {{ Form::select('call_remark_id', $call_remarks, null, array('class'=>'form-control', 'placeholder'=>'Please select ...', 'required')) }}
                </div>
                <div class="form-group col-md-6">
                  <label for="raiseTicket">Raise Ticket</label>
                  <select name="raiseTicket" id="raiseTicket" class="form-control" required>
                    <option value="No">No</option>
                    <option value="yes">Yes</option>
                  </select>

                </div>
              </div>
              <div class="form-group">
                <label for="verbatim">Verbatim</label>
                <input type="text" class="form-control" id="verbatim" name="verbatim" placeholder="Enter Verbatim">
              </div>
              <button type="submit" class="btn btn-primary btn-block">
                Submit
              </button>
        </form>
        </div> 
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
