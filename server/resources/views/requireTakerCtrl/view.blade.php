@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-10">
            <h3>Your Taken Request</h3>
        </div>
        <div class="col-md-2 text-center">
            <a href="/require/finish" class="btn btn-lg btn-success">Finished</a>
        </div>
    </div><br>
    @foreach ($requesters as $requester)
        @if (isset($usersTakenRequests[$requester->id]))
            <div class="card">
                <div class="card-header">
                    <div class="row text-center">
                        <div class="col-md-4">
                            <img src="/storage/file/{{$requester->image}}" alt="{{$requester->image}}" height="100">
                        </div>
                        <div class="col-md-6">
                            <br>
                            Name: <strong>{{$requester->name}}</strong><br>
                            Room: <strong>{{$requester->room_number}}</strong>
                        </div>
                        <div class="col-md-2">
                            <br>
                            <a href="/require/delete/{{$requester->id}}" class="btn btn-lg btn-danger">Remove This!</a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <ul>
                        @foreach ($usersTakenRequests[$requester->id] as $userRequest)
                            <li>
                                <div class="card text-center">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <img src="/storage/file/{{$userRequest->image}}" alt="{{$userRequest->image}}" height="100" width="100">
                                        </div>
                                        <div class="col-md-10">
                                            Name: <strong>{{$userRequest->name}}</strong><br>
                                            Amount: <strong>{{$userRequest->amount}}</strong><br>
                                            Note: <strong>{{$userRequest->note}}</strong>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            @endif
        <br>
    @endforeach
    <hr>

    <h3>All Request</h3>
    @foreach ($requesters as $requester)
        @if (isset($usersRequests[$requester->id]))
            <div class="card">
                <div class="card-header">
                    <div class="row text-center">
                        <div class="col-md-4">
                            <img src="/storage/file/{{$requester->image}}" alt="{{$requester->image}}" height="100">
                        </div>
                        <div class="col-md-6">
                            <br>
                            Name: <strong>{{$requester->name}}</strong><br>
                            Room: <strong>{{$requester->room_number}}</strong>
                        </div>
                        <div class="col-md-2">
                            <br>
                            <a href="/require/add/{{$requester->id}}" class="btn btn-lg btn-warning">Take This!</a>
                        </div>
                    </div>
                    
                </div>
                <div class="card-body">
                    <ul>
                        @foreach ($usersRequests[$requester->id] as $userRequest)
                            <li>
                                <div class="card text-center">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <img src="/storage/file/{{$userRequest->image}}" alt="{{$userRequest->image}}" height="100" width="100">
                                        </div>
                                        <div class="col-md-10">
                                            Name: <strong>{{$userRequest->name}}</strong><br>
                                            Amount: <strong>{{$userRequest->amount}}</strong><br>
                                            Note: <strong>{{$userRequest->note}}</strong>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif
        <br>
    @endforeach
@endsection