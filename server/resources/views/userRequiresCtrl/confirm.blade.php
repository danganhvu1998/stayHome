@extends('layouts.app')

@section('content')
    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif
    
    <p>You have <strong>{{Auth::user()->point}}</strong> point left</p>
    <h3>Buying Goods</h3>
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

    <h3>Confirmed Buying Goods</h3>
    <div class="card-columns">
            @foreach ($confirmedUserRequires as $confirmedUserRequire)
                <div class="card bg-light">
                    <div class="card-header text-center">
                        {{$confirmedUserRequire->name}}
                    </div>
                    <div class="card-body row">
                        <div class="col-md-5">
                            <img src="/storage/file/{{$confirmedUserRequire->image}}" alt="{{$confirmedUserRequire->image}}" width="125" height="125">
                        </div>
                        <div class="col-md-7">
                            Price: {{$confirmedUserRequire->price}}¥ +-10% <hr>
                            Amount: <strong class="text-danger">{{$confirmedUserRequire->amount}}</strong><br>
                            Note: <strong class="text-success">{{$confirmedUserRequire->note}}</strong>
                        </div>
                    </div>
                    
                    <div class="card-footer row">
                        <div class="col-md-9">
                            Status: {{$confirmedUserRequire->status}}
                            @if ($confirmedUserRequire->status==1)
                                Pending
                            @elseif($confirmedUserRequire->status==2)
                                Buying
                            @else
                                Time to take it home!
                            @endif
                        </div>
                        <div class="btn-group col-md-3">
                            <a href="/user_require/delete/{{$confirmedUserRequire->id}}" class="btn btn-sm btn-danger">Remove</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
@endsection