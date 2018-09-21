@extends('layouts.app')

@section('content')
    <h3>INFOMATION SETTING</h3>
    <!--Change Name-->
    {!! Form::open(['action' => 'UsersController@userSettingNameChange', 'method' => 'POST']) !!}
    <div>
        <span>Fullname</span>
        {{Form::text("user_name", $user->name, ['class'=>'form-control', 'placeholder' => 'Fullname'])}}
    </div>
    {{Form::submit('Save', ['class' => 'btn btn-outline-primary'])}}
    {!! Form::close() !!}

    <!--Change Password--> <hr>
    {!! Form::open(['action' => 'UsersController@userSettingPasswordChange', 'method' => 'POST']) !!}
    <div>
        <span>New Password</span>
        {{Form::text("user_password", "", ['class'=>'form-control', 'placeholder' => 'password'])}}
    </div>
    {{Form::submit('Save', ['class' => 'btn btn-outline-primary'])}}
    {!! Form::close() !!}

    <!--Change Image--> <hr>
    {!! Form::open(['action' => 'UsersController@userSettingImageChange', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    <span>New Profile Picture</span>
    {{Form::file('file')}}
    {{Form::submit('UPLOAD (Maximum 2MB)', ['class' => 'btn btn-outline-primary'])}}
    {!! Form::close() !!}
    <hr>
    <hr>
    <h3>ADDRESS SETTING</h3>
    <p>You have to register building to be able to request or take other request</p>
    @foreach ($buildings as $building)
        <div class="row text-center">
            <div class="col-md-4"><img src="/storage/file/{{$building->image}}" alt="NO IMAGE" width="200"></div>
            <div class="col-md-5">
                <p><strong>{{$building->name}}</strong></p>
                <p>{{$building->address}}</p>
                <p><strong>{{$building->postal_code}}</strong></p>
            </div>
            <div class="col-md-3">
                    {!! Form::open(['action' => 'UsersController@userSettingAddressChange', 'method' => 'POST']) !!}
                    {{Form::hidden("buildingID", $building->id, ['class'=>'form-control'])}}
                    <div>
                        <p>I live here at room number: </p>
                        {{Form::text("room_number", "", ['class'=>'form-control', 'placeholder' => 'Room Number'])}}
                    </div>
                    {{Form::submit('Save', ['class' => 'btn btn-outline-primary'])}}
                    {!! Form::close() !!}
            </div>
        </div>    
        <hr>
    @endforeach
@endsection
