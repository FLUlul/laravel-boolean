@extends('layouts.main-layout')
@section('content')
    <br><br><a class="btn btn-primary" href="{{route('create')}}">Create new Postcard</a><br><br>

    <postcards-component></postcards-component>
@endsection