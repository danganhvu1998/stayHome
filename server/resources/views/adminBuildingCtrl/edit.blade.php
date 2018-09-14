@extends('layouts.admin')

@section('content')
    <h3>Edit Building</h3>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    {!! Form::open(['action' => 'AdminBuildingsController@editBuilding', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    {{Form::hidden("buildingID", $building->id, ['class'=>'form-control'])}}
    <div>
        <span>Name</span>
        {{Form::text("building_name", $building->name, ['class'=>'form-control', 'placeholder' => 'Fullname'])}}
    </div>
    <div>
        <span>Address</span>
        {{Form::text("building_address", $building->address, ['class'=>'form-control', 'placeholder' => 'Address'])}}
    </div>
    <div>
        <span>Postal Code</span>
        {{Form::text("building_postal_code", $building->postal_code, ['class'=>'form-control', 'placeholder' => 'Postal Code'])}}
    </div>
    <div>
        Photo {{Form::file('file')}}
    </div>
    {{Form::submit('Save', ['class' => 'btn btn-outline-primary'])}}
    {!! Form::close() !!}
@endsection