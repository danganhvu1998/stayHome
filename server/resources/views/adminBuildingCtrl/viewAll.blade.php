@extends('layouts.admin')

@section('content')
    @foreach ($buildings as $building)
        <div class="row text-center">
            <div class="col-md-5"><img src="/storage/file/{{$building->image}}" alt="NO IMAGE" width="200"></div>
            <div class="col-md-7">
                <p><strong>{{$building->name}}</strong></p>
                <p>{{$building->address}}</p>
                <p><strong>{{$building->postal_code}}</strong></p>
            </div>
        </div>    
        <hr>
    @endforeach
@endsection