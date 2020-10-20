@if(isset($escalation))
    {!! Form::model($escalation, ['url' => "escalation/$escalation->id", 'method' => 'put', 'class' => 'form-horizontal']) !!}
@else
    {!! Form::open(['url' => 'escalation', 'method' => 'post', 'class' => 'form-horizontal']) !!}
@endif
    <div class="form-group">
        {{ Form::label('Query Type') }}
        {{ Form::select('query_type_id', $query_types, null, array('class'=>'form-control', 'placeholder'=>'Please select ...')) }}
    </div>
    <div class="form-group">
        {{ Form::label('Assign/Mail To') }}
        {{ Form::select('user_id', $users, null, array('class'=>'form-control', 'placeholder'=>'Please select ...')) }}
    </div>
    <div class="form-group {{ $errors->has('mail_cc') ? 'has-error' : ''}}">
        {!! Form::label('mail_cc', 'Mail CC')!!}
        {!! Form::text('mail_cc', null, ['class' => 'form-control','placeholder' => 'Enter Email Address', 'autocomplete' => 'off']) !!}
        <span class="text-danger">
            {{ $errors->first('mail_cc') }}
        </span>
    </div>

    @if(isset($escalation))
        {!! Form::Submit('Update', ['class' => 'btn btn-success pull-right']) !!}
    @else
        {!! Form::Submit('Submit', ['class' => 'btn btn-primary pull-right']) !!}
    @endif



{!! Form::close() !!}