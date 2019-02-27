@extends('layouts.app')
@section('title', 'Search')
@section('content')
{!! Form::open(['method' => 'GET']) !!}
{!! Form::submit('戻る') !!}
{!! Form::close() !!}
@foreach($all_data as $xxx)
<table>
  <tr><td>No.</td><td>{{{ $xxx->employee_number }}}</td></tr>
    <tr><td>name</td><td>{{{ $xxx->name }}}</td></tr>
    <tr><td>position</td><td>{{{ $xxx->position }}}</td></tr>
    <tr><td>division</td><td>{{{ $xxx->division }}}</td></tr>
    <tr><td>gender</td><td>{{{ $xxx->gender }}}</td></tr>
    <tr><td>marital_status</td><td>{{{ $xxx->marital_status }}}</td></tr>
    <tr><td>birthday</td><td>{{{ $xxx->birthday }}}</td></tr>
    <tr><td>join_date</td><td>{{{ $xxx->join_date }}}</td></tr>
    <tr><td>probation_date</td><td>{{{ $xxx->probation_date }}}</td></tr>
    <tr><td>address</td><td>{{{ $xxx->address }}}</td></tr>
    <!--
    <tr><td>hometown</td><td>{ $xxx->hometown }}}</td></tr>
    <tr><td>period</td><td>{ $xxx->period }}}</td></tr>
    <tr><td>last_position</td><td>{ $xxx->last_position }}}</td></tr>
    <tr><td>reason_type</td><td>{ $xxx->reason_type }}}</td></tr>
    <tr><td>reason_note</td><td>{ $xxx->reason_note }}}</td></tr>
    -->
@endforeach
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