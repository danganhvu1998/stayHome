@extends('layouts.admin')

@section('content')
    <h3>Add Building</h3>
    {!! Form::open(['action' => 'AdminBuildingsController@addBuilding', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    <div>
        <span>Name</span>
        {{Form::text("building_name", '', ['class'=>'form-control', 'placeholder' => 'Fullname'])}}
    </div>
    <div>
        <span>Address</span>
        {{Form::text("building_address", '', ['class'=>'form-control', 'placeholder' => 'Address'])}}
    </div>
    <div>
        <span>Postal Code</span>
        {{Form::text("building_postal_code", '', ['class'=>'form-control', 'placeholder' => 'Postal Code'])}}
    </div>
    <div>
        Photo {{Form::file('file')}}
    </div>
    {{Form::submit('Add', ['class' => 'btn btn-outline-primary'])}}
    {!! Form::close() !!}
@endsection