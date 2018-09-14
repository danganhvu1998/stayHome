@extends('layouts.app')

@section('content')
    <div class="card-columns">
        @foreach ($allGoods as $goods)
            <div class="card bg-light">
                <div class="card-header">{{$goods->id}} - {{$goods->name}}</div>
                <div class="card-body row">
                    <div class="col-md-5">
                        <img src="/storage/file/{{$goods->image}}" alt="{{$goods->image}}" width="125" height="125">
                    </div>
                    <div class="col-md-7">
                        Price: {{$goods->price}}¥ +-10% <hr>
                        <strong>{{$marketsList[$goods->market_id]}}</strong>
                    </div>
                </div>
                <div class="card-footer">
                    </form>
                    {!! Form::open(['action' => 'GoodsController@goodsBuying', 'method' => 'POST', 'class' => 'form-inline']) !!}
                    {{Form::hidden("goodsID", $goods->id, ['class'=>'form-control'])}}
                    <div class="form-group">
                        <label for="amount" class="mr-sm-2">Amount: </label>
                        <input type="number" class="mr-sm-2" id="amount" name="amount" value=1>
                    </div>
                    <div class="form-group">
                        <input type="text" class="mr-sm-2" id="note" name="note" placeholder="Any Note?">
                    </div>
                    <button type="submit" class="btn btn-outline-primary">BUY</button>
                    {!! Form::close() !!}
                </div>
            </div>
        @endforeach
    </div>
    <hr>
    <div class="text-center">
        <span>Can't find one?</span> <a href="/goods/add" class="btn btn-danger">Make One Here!</a>
    </div>
@endsection