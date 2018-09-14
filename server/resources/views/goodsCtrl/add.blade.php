@extends('layouts.app')

@section('content')
    <h3>Add Goods</h3>
    {!! Form::open(['action' => 'GoodsController@goodsAdding', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    <div>
        <span>Name (Be clear as possible)</span>
        {{Form::text("goods_name", '', ['class'=>'form-control', 'placeholder' => 'Product name'])}}
    </div>
    <div>
        <span>Price (Approximate - Yen ¥¥¥)</span>
        {{Form::number("goods_price", '', ['class'=>'form-control', 'placeholder' => 'Price'])}}
    </div>
    <div>
        <span>Suggest Market (Better price, quality, etc)</span>
        {{Form::select('goods_market_id', $marketsList)}}
    </div>
    <div>
        Product Picture: {{Form::file('file')}}
    </div>
    {{Form::submit('Add', ['class' => 'btn btn-outline-primary'])}}
    {!! Form::close() !!}
@endsection