@extends('layouts.admin')




@section('content')


    <h1>Profile</h1>

    <div>
        Hi, welcome {{$user->name}} login. Your virtual currency number is {{$user->virtual_currency}}
    </div>

@stop