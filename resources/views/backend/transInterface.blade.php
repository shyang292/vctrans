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