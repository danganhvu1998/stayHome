@extends('layouts.app')

@section('content')
    <h3>Orders From You</h3>
    @foreach ($userFinishedSingleRequires as $require)
        <div class="card bg-light">
            <div class="card-header text-center">
                <b>{{$require->name}}</b> -- Status:
                @if ($require->status==4)
                    <b class="text-success">SUCCESS</b>
                @elseif($require->status==5)
                    <b class="text-danger">FAILT</b>
                @elseif($require->status==6)
                    <b class="text-danger">TIME OUT</b>
                @endif
            </div>
            <div class="row">
                <div class="col-md-2">
                    <img src="/storage/file/{{$require->image}}" alt="{{$require->image}}" width="100" height="100">
                </div>
                <div class="col-md-4 text-center">
                    Price: <strong>{{$require->price}}¥ </strong>+ tax<br>
                    Amount: <strong class="text-danger">{{$require->amount}}</strong><br>
                    Note: <strong class="text-success">{{$require->note}}</strong>
                </div>
                <div class="col-md-2">
                    <img src="/storage/file/{{$require->user_image}}" alt="{{$require->user_image}}"  height="100">
                </div>
                <div class="col-md-4 text-center">
                    Buyer: <strong>{{$require->user_name}}</strong><br>
                    Room: <strong>{{$require->room_number}}</strong>
                </div>
            </div>
        </div><br>
    @endforeach
    <hr>

    <h3>Orders You Finished</h3>
    @foreach ($usersFinishedTakenRequires as $require)
        <div class="card bg-light">
            <div class="card-header text-center bg-gradient-primary">
                <b>{{$require->name}}</b> -- Status:
                @if ($require->status==4)
                    <b class="text-success">SUCCESS</b>
                @elseif($require->status==5)
                    <b class="text-danger">FAILT</b>
                @elseif($require->status==6)
                    <b class="text-danger">TIME OUT</b>
                @endif
            </div>
            <div class="row">
                <div class="col-md-2">
                    <img src="/storage/file/{{$require->image}}" alt="{{$require->image}}" width="100" height="100">
                </div>
                <div class="col-md-3 text-center">
                    Price: <strong>{{$require->price}}¥ </strong>+ tax<br>
                    Amount: <strong class="text-danger">{{$require->amount}}</strong><br>
                    Note: <strong class="text-success">{{$require->note}}</strong>
                </div>
                <div class="col-md-3">
                    <img src="/storage/file/{{$require->user_image}}" alt="{{$require->user_image}}"  height="100">
                </div>
                <div class="col-md-4 text-center">
                    Order From: <strong>{{$require->user_name}}</strong><br>
                    Room: <strong>{{$require->room_number}}</strong>
                </div>
            </div>
        </div><br>
    @endforeach
@endsection