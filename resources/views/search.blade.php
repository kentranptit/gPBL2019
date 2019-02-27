@extends('layouts.app')
@section('title', 'Search')
@section('content')
<center>
    <h1>
        {!! Form::open(['method' => 'GET']) !!}
        {!! Form::text('s', NULL) !!}
        {!! Form::select('gender', [NULL, 'Male', 'Female']) !!}
        {!! Form::submit('検索') !!}
        {!! Form::close() !!}
    </h1>
    <table>
        @foreach($all_data as $xxx)
        <tr>
            <td>{{{ $xxx->employee_number }}}</td>
            <td>{{{ $xxx->name }}}</tr>
        </td>
        @endforeach
    </table>
</center>
<style>
    table {
        border-collapse: collapse;
    }
    td {
        border: solid 1px;
        padding: 0.5em;
    }
</style>
@endsection
