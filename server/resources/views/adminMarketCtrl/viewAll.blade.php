@extends('layouts.admin')

@section('content')
    <h3>Market List</h3>
    @foreach ($markets as $market)
        <div class="row text-center">
            <div class="col-md-5">
                <a href="/admin/market/edit/{{$market->id}}">
                    <img src="/storage/file/{{$market->image}}" alt="NO IMAGE" width="200">
                </a>
            </div>
            <div class="col-md-7">
                <p><strong>{{$market->name}}</strong></p>
                <p>{{$market->address}}</p>
                <p><strong>{{$market->postal_code}}</strong></p>
            </div>
        </div>    
        <hr>
    @endforeach
@endsection