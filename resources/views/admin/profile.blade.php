@extends('layout.blayout')
@section('title','Profile')
@section('page_title','Profile')
@section('content')
<div class="row text-center">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <div class="card">
            <img class="card-img-top w-25 m-auto" src="{{ asset('img/user.png') }}" alt="">
            <div class="card-body">
                <h4 class="card-title">{{ $data->name }}</h4>
                <p class="card-text">{{ $data->email }}</p>
            </div>
        </div>
    </div>
    <div class="col-md-2"></div>
</div>
@endsection