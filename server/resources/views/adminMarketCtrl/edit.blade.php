@extends('layouts.admin')

@section('content')
    <h3>Edit Market</h3>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    {!! Form::open(['action' => 'AdminMarketsController@editMarket', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    {{Form::hidden("marketID", $market->id, ['class'=>'form-control'])}}
    <div>
        <span>Name</span>
        {{Form::text("market_name", $market->name, ['class'=>'form-control', 'placeholder' => 'Fullname'])}}
    </div>
    <div>
        <span>Address</span>
        {{Form::text("market_address", $market->address, ['class'=>'form-control', 'placeholder' => 'Address'])}}
    </div>
    <div>
        <span>Postal Code</span>
        {{Form::text("market_postal_code", $market->postal_code, ['class'=>'form-control', 'placeholder' => 'Postal Code'])}}
    </div>
    <div>
        Photo {{Form::file('file')}}
    </div>
    {{Form::submit('Save', ['class' => 'btn btn-outline-primary'])}}
    {!! Form::close() !!}
@endsection