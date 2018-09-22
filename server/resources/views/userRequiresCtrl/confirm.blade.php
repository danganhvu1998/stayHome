@extends('layouts.app')

@section('content')
    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif
    
    <p>You have <strong>{{Auth::user()->point}}</strong> point left</p>
    @if (!isset(Auth::user()->room_number))
        <a href="/user/setting" class="btn btn-outline-primary">Hey, where is your room? Don't be shy, everyone want to see you!</a>
    @endif
    <h3>Your buying list</h3>
    <div class="card-columns">
        @foreach ($userRequires as $userRequire)
            <div class="card bg-light">
                <div class="card-header text-center">
                    {{$userRequire->name}}
                </div>
                <div class="card-body row">
                    <div class="col-md-5">
                        <img src="/storage/file/{{$userRequire->image}}" alt="{{$userRequire->image}}" width="125" height="125">
                    </div>
                    <div class="col-md-7">
                        Price: {{$userRequire->price}}¥ +-10% <hr>
                        Amount: <strong class="text-danger">{{$userRequire->amount}}</strong><br>
                        Note: <strong class="text-success">{{$userRequire->note}}</strong>
                    </div>
                </div>
                
                <div class="card-footer" align="right">
                    <div class="btn-group btn-group-justified text-center">
                        <a href="/user_require/goodsConfirm/{{$userRequire->id}}" class="btn btn-sm btn-primary">Confirm</a>
                        <a href="/user_require/delete/{{$userRequire->id}}" class="btn btn-sm btn-danger">Remove</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="text-center">
        <span></span> <a href="/user_require/goodsConfirmAll" class="btn btn-success">Confirm All</a>
    </div>
    <hr>

    <h3>Confirmed buying goods</h3>
    <div class="card-columns">
        @foreach ($confirmedUserRequires as $confirmedUserRequire)
            <div class="card bg-light">
                <div class="card-header text-center">
                    {{$confirmedUserRequire->name}}
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-5">
                            <img src="/storage/file/{{$confirmedUserRequire->image}}" alt="{{$confirmedUserRequire->image}}" width="125" height="125">
                        </div>
                        <div class="col-md-7">
                            Price: {{$confirmedUserRequire->price}}¥ +-10% <hr>
                            Amount: <strong class="text-danger">{{$confirmedUserRequire->amount}}</strong><br>
                            Note: <strong class="text-success">{{$confirmedUserRequire->note}}</strong>
                        </div>
                    </div>
                </div>
                
                <div class="card-footer">
                    <div class="row">
                        <div class="col-md-9">
                            Someone will pick it up soon!
                        </div>
                        <div class="btn-group col-md-3">
                            <a href="/user_require/delete/{{$confirmedUserRequire->id}}" class="btn btn-sm btn-danger">Remove</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div><hr>

    <h3>Someone is buying</h3>
    <div>
        @foreach ($takenUserRequires as $require)
            <div class="card bg-light">
                <div class="card-header text-center">
                    {{$require->name}}
                </div>
                <div class="row">
                    <div class="col-md-2">
                        <img src="/storage/file/{{$require->image}}" alt="{{$require->image}}" width="100" height="100">
                    </div>
                    <div class="col-md-3 text-center">
                        Price: <strong>{{$require->price}}¥ </strong>+-10%<br>
                        Amount: <strong class="text-danger">{{$require->amount}}</strong><br>
                        Note: <strong class="text-success">{{$require->note}}</strong>
                    </div>
                    <div class="col-md-3">
                        <img src="/storage/file/{{$require->user_image}}" alt="{{$require->user_image}}"  height="100">
                    </div>
                    <div class="col-md-4 text-center">
                        Buyer: <strong>{{$require->user_name}}</strong><br>
                        Room: <strong class="text-success">{{$require->room_number}}</strong>
                    </div>
                </div>
            </div><br>
        @endforeach
    </div><hr>

    <h3>Your stuffs is home!</h3>
    <span class="text-danger">Important: Once you confirmed, it cannot be redone. <strong>PLEASE PLAY FAIR!</strong></span><br>
    <div>
        @foreach ($finishedUserRequires as $require)
            <div class="card bg-light">
                <div class="card-header text-center">
                    <div class="row">
                        <div class="col-md-8">{{$require->name}}</div>
                        <div class="col-md-4">
                            <div class="btn-group">
                                <a href="/user_require/finish/failt/{{$require->id}}" class="btn btn-danger">It's NOT here</a>
                                <a href="/user_require/finish/success/{{$require->id}}" class="btn btn-success">Confirmed It is HERE</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        <img src="/storage/file/{{$require->image}}" alt="{{$require->image}}" width="100" height="100">
                    </div>
                    <div class="col-md-3 text-center">
                        Price: <strong>{{$require->price}}¥ </strong>+-10%<br>
                        Amount: <strong class="text-danger">{{$require->amount}}</strong><br>
                        Note: <strong class="text-success">{{$require->note}}</strong>
                    </div>
                    <div class="col-md-3">
                        <img src="/storage/file/{{$require->user_image}}" alt="{{$require->user_image}}"  height="100">
                    </div>
                    <div class="col-md-4 text-center">
                        Buyer: <strong>{{$require->user_name}}</strong><br>
                        Room: <strong class="text-success">{{$require->room_number}}</strong>
                    </div>
                </div>
            </div><br>
        @endforeach
    </div><hr>
@endsection