@extends('layouts.app')
@section('title', 'Welcome')
@section('content')
@section('styles')
<style>
    img {
        overflow: hidden;
    }
</style>
@endsection
<p class="h3 text-primary text-center">Welcome to 慰留 - GPBL2019</p>
<div class="d-flex justify-content-around mt-4">
    <div class="card text-center p-3" style="width: 18rem;">
        <div class="img-holder">
            <img class="rounded-circle" src="{{ asset('/img/ken.jpg') }}" class="card-img-top" alt="...">
        </div>
        <div class="card-body">
            <p class="h4 card-title">Ken</p>
            <p class="card-text">Description</p>
        </div>
    </div>
    <div class="card text-center p-3" style="width: 18rem;">
        <div class="img-holder">
            <img class="rounded-circle" src="{{ asset('/img/nam.jpg') }}" class="card-img-top" alt="...">
        </div>
        <div class="card-body">
            <p class="h4 card-title">Nam</p>
            <p class="card-text">Description</p>
        </div>
    </div>
    <div class="card text-center p-3" style="width: 18rem;">
        <div class="img-holder">
            <img class="rounded-circle" src="https://via.placeholder.com/150" class="card-img-top" alt="...">
        </div>
        <div class="card-body">
            <p class="h4 card-title">Peter</p>
            <p class="card-text">Description</p>
        </div>
    </div>
    <div class="card text-center p-3" style="width: 18rem;">
        <div class="img-holder">
            <img class="rounded-circle" src="https://via.placeholder.com/150" class="card-img-top" alt="...">
        </div>
        <div class="card-body">
            <p class="h4 card-title">Takku</p>
            <p class="card-text">Description</p>
        </div>
    </div>
</div>
@endsection
