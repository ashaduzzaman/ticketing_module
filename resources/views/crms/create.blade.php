<!DOCTYPE html>
<html>
<head>
  <title>CRM</title>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
</head>
<body>
  <div class="container">
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>	
            <strong>{{ $message }}</strong>
        </div>
    @endif
    <div class="card bg-secondary text-white" style="height: 600px;">
        <div class="card-header text-center">
          CRM: Phone No:<mark>{{ $phoneNumber }}</mark> & Agent: <mark>{{ $agent }}</mark>
        </div>
        <div class="card-body">
          <form action="/crm/store" method="post">
            @csrf
            <input type="hidden" class="form-control" id="" placeholder="" name="agent_name" value="<?php echo $agent; ?>">
              <input type="hidden" class="form-control" id="" placeholder="" name="customer_contact" value="<?php echo $phoneNumber; ?>">
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="Customer_name">Name</label>
                  <input type="text" class="form-control" id="customer_name" name="customer_name" value="<?php if(isset($customer_name))echo $customer_name; ?>" placeholder="Name">
                </div>
                <div class="form-group col-md-6 {{ $errors->has('name') ? 'has-error' : ''}}">
                    {{ Form::label('District Name') }}
                    {{ Form::select('district_id', $districts, null, array('class'=>'form-control', 'placeholder'=>'Please select ...')) }}
                </div>
                <!-- <div class="form-group col-md-6">
                  <label for="district">District</label>
                  <select id="district" class="form-control" name="district">
                    <option selected>Choose...</option>
                    <option value="Bagerhat">Bagerhat</option>
                    <option value="Bandarban">Bandarban </option>
                    <option value="Barguna">Barguna  </option>
                    <option value="Barisal">Barisal  </option>
                    <option value="Bhola">Bhola  </option>
                    <option value="Bogra">Bogra </option>
                    <option value="Brahmanbaria">Brahmanbaria </option>
                    <option value="Chandpur">Chandpur </option>
                    <option value="Chapainawabganj">Chapainawabganj </option>
                    <option value="Chittagong">Chittagong  </option>
                    <option value="Chuadanga">Chuadanga  </option>
                    <option value="Comilla">Comilla </option>
                    <option value="Coxs Bazar ">Coxs Bazar  </option>
                    <option value="Dhaka">Dhaka </option>
                    <option value="Dinajpur">Dinajpur  </option>
                    <option value="Faridpur">Faridpur </option>
                    <option value="Feni">Feni </option>
                    <option value="Gaibandha">Gaibandha </option>
                    <option value="Gazipur">Gazipur  </option>
                    <option value="Gopalganj">Gopalganj </option>
                    <option value="Habiganj">Habiganj </option>
                    <option value="Jamalpur">Jamalpur </option>
                    <option value="Jessore">Jessore </option>
                    <option value="Jhalokati">Jhalokati </option>
                    <option value="Jhenaidah">Jhenaidah </option>
                    <option value="Joypurhat">Joypurhat </option>
                    <option value="Khagrachhari">Khagrachhari  </option>
                    <option value="Khulna">Khulna </option>
                    <option value="Kishoreganj">Kishoreganj </option>
                    <option value="Kurigram">Kurigram </option>
                    <option value="Kushtia">Kushtia </option>
                    <option value="Lakshmipur">Lakshmipur  </option>
                    <option value="Lalmonirhat">Lalmonirhat </option>
                    <option value="Madaripur">Madaripur </option>
                    <option value="Magura">Magura </option>
                    <option value="Manikganj">Manikganj </option>
                    <option value="Meherpur">Meherpur </option>
                    <option value="Moulvibazar">Moulvibazar </option>
                    <option value="Munshiganj">Munshiganj </option>
                    <option value="Mymensingh">Mymensingh </option>
                    <option value="Naogaon">Naogaon  </option>
                    <option value="Narail">Narail</option>
                    <option value="Narayanganj">Narayanganj  </option>
                    <option value="Narsingdi">Narsingdi </option>
                    <option value="Natore">Natore </option>
                    <option value="Netrakona">Netrakona </option>
                    <option value="Nilphamari">Nilphamari </option>
                    <option value="Noakhali">Noakhali   </option>
                    <option value="Pabna">Pabna  </option>
                    <option value="Panchagarh">Panchagarh   </option>
                    <option value="Patuakhali">Patuakhali   </option>
                    <option value="Pirojpur">Pirojpur </option>
                    <option value="Rajbari">Rajbari </option>
                    <option value="Rajshahi">Rajshahi  </option>
                    <option value="Rangamati">Rangamati  </option>
                    <option value="Rangpur">Rangpur  </option>
                    <option value="Satkhira">Satkhira   </option>
                    <option value="Shariatpur">Shariatpur  </option>
                    <option value="Sherpur">Sherpur   </option>
                    <option value="Sirajgonj">Sirajgonj  </option>
                    <option value="Naogaon">Naogaon  </option>
                    <option value="Sunamganj">Sunamganj   </option>
                    <option value="Sylhet">Sylhet </option>
                    <option value="Tangail">Tangail </option>
                    <option value="Thakurgaon">Thakurgaon </option>
                  </select>
                </div> -->
              </div>
              <div class="form-group">
                <label for="address">Address</label>
                <input type="text" class="form-control" id="address" name="address" value="<?php if(isset($address))echo $address; ?>" placeholder="Address">
              </div>
              <div class="form-row">
                <div class="form-group col-md-3">
                  <label for="profession">Profession</label>
                  <input type="text" class="form-control" id="profession" name="profession" value="<?php if(isset($profession))echo $profession; ?>" placeholder="Profession">
                </div>
                <div class="form-group col-md-3">
                
                    {{ Form::label('Query Type') }}
                    {{ Form::select('query_type_id', $query_types, null, array('class'=>'form-control', 'placeholder'=>'Please select ...')) }}
                </div>
                <div class="form-group col-md-3">
                    {{ Form::label('Department Name') }}
                    {{ Form::select('department_id', $departments, null, array('class'=>'form-control', 'placeholder'=>'Please select ...')) }}
                </div>
                <div class="form-group col-md-3">
                  {{ Form::label('Complain Type') }}
                  {{ Form::select('complain_type_id', $complain_types, null, array('class'=>'form-control', 'placeholder'=>'Please select ...')) }}
                </div>
              </div>
              
              <div class="form-row">
                <div class="form-group col-md-6">
                  {{ Form::label('Call Remarks') }}
                  {{ Form::select('call_remark_id', $call_remarks, null, array('class'=>'form-control', 'placeholder'=>'Please select ...')) }}
                </div>
                <div class="form-group col-md-6">
                  <label for="raiseTicket">Raise Ticket</label>
                  <select name="raiseTicket" id="raiseTicket" class="form-control">
                    <option value="No">No</option>
                    <option value="yes">Yes</option>
                  </select>

                </div>
              </div>
              <div class="form-group">
                <label for="verbatim">Verbatim</label>
                <input type="text" class="form-control" id="verbatim" name="verbatim" placeholder="Enter Verbatim">
              </div>
              <button type="submit" class="btn btn-primary btn-block">Submit</button>
              
          
        </form>
        </div> 
    </div>
  </div>
  
</body>
</html>
