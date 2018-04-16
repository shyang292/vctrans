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

    {!! Form::open(['action' => 'UserController@transferVC', 'method' => 'post']) !!}
    <div class="form-group">

        {!! Form::label('username', 'Receiver User Name:') !!}

        {!! Form::text('userName', null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">

        {!! Form::label('number', 'Virtual Currency Number:') !!}

        {!! Form::text('number', null, ['class'=>'form-control']) !!}
    </div>


    <div class="form-group">

        {!! Form::submit('add a new transfer', ['class'=>'btn btn-primary']) !!}

    </div>

    {!! Form::close() !!}

    <div class="row">

        @include('includes.form_error')


    </div>


    <table class="table">
        <thead>
        <tr>
            <th></th>
            <th>sender</th>
            <th>receiver</th>
            <th>number</th>
            <th>action</th>
        </tr>
        </thead>
        <tbody>
            @if($user)
                @for($i =0;$i<$receiverNumber;$i++)
                <tr>
                    <td>
                        {{$i+1}}
                    </td>
                    <td>
                        {{$user->name}}
                    </td>
                    <td>

                    </td>
                    <td></td>

                </tr>
                @endfor
            @endif
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