@extends('layouts.app')

@section('content')
    <h3>Edit Goods</h3>
    {!! Form::open(['action' => 'GoodsController@goodsEditing', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    {{Form::hidden("goodsID", $goods->id, ['class'=>'form-control'])}}
    <div>
        <span>Name (Be clear as possible)</span>
        {{Form::text("goods_name", $goods->name, ['class'=>'form-control', 'placeholder' => 'Product name'])}}
    </div>
    <div>
        <span>Price (Approximate - Yen ¥¥¥)</span>
        {{Form::number("goods_price", $goods->price, ['class'=>'form-control', 'placeholder' => 'Price'])}}
    </div>
    <div>
        <span>Suggest Market (Better price, quality, etc)</span>
        {{Form::select('goods_market_id', $marketsList, $goods->market_id)}}
    </div>
    <div>
        Product Picture: {{Form::file('file')}}
    </div>
    {{Form::submit('Save', ['class' => 'btn btn-outline-primary'])}}
    {!! Form::close() !!}
@endsection