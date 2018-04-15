@extends('layouts.admin')





@section('content')




    <h1>Virtual Currency Transfer</h1>

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


    <table class="table">
        <thead>
        <tr>
            <th>sender</th>
            <th>receiver</th>
            <th>number</th>
            <th>action</th>
        </tr>
        </thead>
        <tbody>

        {{--@if($users)--}}


            {{--@foreach($users as $user)--}}

                {{--<tr>--}}
                    {{--<td>{{$user->id}}</td>--}}
                    {{--<td> <img height="50" src="{{$user->photo ? $user->photo->file : 'http://placehold.it/400x400'}}" alt="" ></td>--}}
                    {{--<td><a href="{{route('admin.users.edit', $user->id)}}">{{$user->name}}</a></td>--}}
                    {{--<td>{{$user->email}}</td>--}}
                {{--</tr>--}}

            {{--@endforeach--}}


        {{--@endif--}}


        </tbody>
    </table>





@stop