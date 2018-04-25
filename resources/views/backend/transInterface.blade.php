@extends('layouts.admin')


@section('notification')

    <li id="noti_Container">
        <div id="noti_Counter">{{count($resArr)}}</div>   <!--SHOW NOTIFICATIONS COUNT.-->
        <!--A CIRCLE LIKE BUTTON TO DISPLAY NOTIFICATION DROPDOWN.-->
        <div id="noti_Button"></div>

        <!--THE NOTIFICAIONS DROPDOWN BOX.-->
        <div id="notifications">
            <h3>Notifications</h3>
            @if($resArr)
                @foreach($resArr as $notification)
                    <div id="notificationItem">
                        {{$notification->message}}
                    </div>
                @endforeach
            @endif
            {{--<div class="seeAll"><a href="#">See All</a></div>--}}
        </div>
    </li>
    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ auth()->user()->name }} <span class="caret"></span></a>
        <ul class="dropdown-menu" role="menu">
            <li><a href="{{ url('/logout') }}">Logout</a></li>
            {{--<li><a href="{{ url('/admin/profile') }}/{{auth()->user()->id}}">Profile</a></li>--}}
        </ul>
    </li>

@stop



@section('content')




    <h1>Virtual Currency Transfer</h1>
    @if(Session::has('failed_transfer'))

        <p class="bg-danger">{{session('failed_transfer')}}</p>


    @endif
    {{--<table class="table">--}}
        {{--<thead>--}}
            {{--<tr>--}}
                {{--<th>sender</th>--}}
                {{--<th>receiver</th>--}}
                {{--<th>number</th>--}}
            {{--</tr>--}}
            {{--<--}}
        {{--</thead>--}}
    {{--</table>--}}



    <div class="row">

        @include('includes.form_error')

    </div>

    {!! Form::open(['action' => 'TransactionLogController@store', 'method' => 'post']) !!}
    <div class="form-group">

        <div class="form-group">
            <input type="hidden" name="sender" value="{{$user}}">
            <input type="hidden" id="sender" name="senderName" value="{{$user->name}}">
            <input type="button" id="addNewTransfer" name="newTransfer" value="add a new transfer" class="btn btn-primary">
            {!! Form::submit('submit', ['class'=>'btn btn-primary']) !!}
        </div>


        <table class="table" id="transferTable">
            <thead>
            <tr>
                <th>ID</th>
                <th>sender</th>
                <th>receiver</th>
                <th>number</th>
                <th>action</th>
            </tr>
            </thead>
            <tbody>

            </tbody>
        </table>

    {!! Form::close() !!}



@stop