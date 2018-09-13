@extends('layouts.app')

@section('content')
    <h3>こんにちは {{$user->name}}さま！</h3>
    <br>
    <div class="row text-center">
        <div class="col-md-5"><img height="150" src="/storage/file/{{$user->image}}" alt="NO IMAGE"></div>
        <div class="col-md-7">
            <strong>{{$user->name}}</strong><br>
            {{$user->room_number}}, {{$user->building_name}}<br> 
            <strong>{{$user->address}}</strong><br>
            {{$user->postal_code}}<br>
            <a href="/user/setting" class="btn btn-block btn-primary">Edit</a>
        </div>
    </div>
    <hr>
@endsection
