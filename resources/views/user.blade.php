@extends('layouts.app')
@section('title', 'Search')
@section('content')
{!! Form::open(['method' => 'GET']) !!}
{!! Form::submit('戻る') !!}
{!! Form::close() !!}
<center>
    @foreach($all_data as $xxx)
    <table>
        <?php
            if(empty($xxx->employee_number)){$xxx->employee_number='none';}
            if(empty($xxx->name)){$xxx->name='none';}
            if(empty($xxx->position)){$xxx->position='none';}
            if(empty($xxx->division)){$xxx->division='none';}
            if(empty($xxx->gender)){$xxx->gender='none';}
            if(empty($xxx->marital_status)){$xxx->marital_status='none';}
            if(empty($xxx->birthday)){$xxx->birthday='none';}
            if(empty($xxx->join_date)){$xxx->join_date='none';}
            if(empty($xxx->probation_date)){$xxx->probation_date='none';}
            if(empty($xxx->address)){$xxx->address='none';}
            if(empty($xxx->hometown)){$xxx->hometown='none';}
            if(empty($xxx->period)){$xxx->period='none';}
            if(empty($xxx->last_position)){$xxx->last_position='none';}
            if(empty($xxx->reason_type)){$xxx->reason_type='none';}
            if(empty($xxx->reasho_note)){$xxx->reason_note='none';}
        ?>
        <tr>
            <td>No.</td>
            <td>{{{ $xxx->employee_number }}}</td>
        </tr>
        <tr>
            <td>name</td>
            <td>{{{ $xxx->name }}}</td>
        </tr>
        <tr>
            <td>position</td>
            <td>{{{ $xxx->position }}}</td>
        </tr>
        <tr>
            <td>division</td>
            <td>{{{ $xxx->division }}}</td>
        </tr>
        <tr>
            <td>gender</td>
            <td>{{{ $xxx->gender }}}</td>
        </tr>
        <tr>
            <td>marital_status</td>
            <td>{{{ $xxx->marital_status }}}</td>
        </tr>
        <tr>
            <td>birthday</td>
            <td>{{{ $xxx->birthday }}}</td>
        </tr>
        <tr>
            <td>join_date</td>
            <td>{{{ $xxx->join_date }}}</td>
        </tr>
        <tr>
            <td>probation_date</td>
            <td>{{{ $xxx->probation_date }}}</td>
        </tr>
        <tr>
            <td>address</td>
            <td>{{{ $xxx->address }}}</td>
        </tr>
        <tr>
            <td>hometown</td>
            <td>{{{ $xxx->hometown }}}</td>
        </tr>
        <tr>
            <td>period</td>
            <td>{{{ $xxx->period }}}</td>
        </tr>
        <tr>
            <td>last_position</td>
            <td>{{{ $xxx->last_position }}}</td>
        </tr>
        <tr>
            <td>reason_type</td>
            <td>{{{ $xxx->reason_type }}}</td>
        </tr>
        <tr>
            <td>reason_note</td>
            <td>{{{ $xxx->reason_note }}}</td>
        </tr>
        @endforeach
    </table>
    <h1> </h1>
    <table>
        <tr>
            <td>date</td>
            <td>checkin</td>
            <td>checkout</td>
        </tr>
        @foreach($c_data as $xxx)
        <?php
            if(empty($xxx->checkin)){continue;}
            if(empty($xxx->checkout)){continue;}
        ?>
        <tr>
            <td>{{{ $xxx->date }}}</td>
            <td>{{{ $xxx->checkin }}}</td>
            <td>{{{ $xxx->checkout }}}</td>
        </tr>
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
        text-align: center;
    }
</style>
@endsection
