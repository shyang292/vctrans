@extends('layouts.admin')





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