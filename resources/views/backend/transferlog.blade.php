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




    <h1>VC transfer log</h1>




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
                @if($results)

                    @foreach($results as $index=> $result)
                        <tr>
                            <td>{{$index+1}}</td>
                            <td>{{$result->sender}}</td>
                            <td>{{$result->receiver}}</td>
                            <td>{{$result->number}}</td>
                            <td></td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>




@stop