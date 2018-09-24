@extends('layouts.admin')

@section('content')
    
    @foreach ($users as $user)
        <div class="card bg-light">
            <div class="row text-center">
                <div class="col-md-3">
                    <img src="/storage/file/{{$user->image}}" alt="{{$user->image}}" height="100">
                </div>
                <div class="col-md-3">
                    <strong>{{$user->name}}</strong><br>
                    {{$user->room_number}} ___ {{$user->building_id}}
                </div>
                <div class="col-md-1">
                    <a href="/admin/user/reset_password/{{$user->id}}" class="btn btn-block btn-warning">Reset</a><br>
                    <a href="/admin/user/ban/{{$user->id}}" class="btn btn-block btn-danger">Ban</a>
                </div>
            </div>
        </div><br>
    @endforeach
@endsection