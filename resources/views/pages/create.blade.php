@extends('layouts.main-layout')
@section('content')
    <br><br><a class="btn btn-success" href="{{route('home')}}">Home</a><br><br>

    <form action="{{route('store')}}" method="POST" enctype="multipart/form-data">

        @method('POST')
        @csrf

        <br><br><label for="sender">sender</label>
        <input type="text" name="sender">
        <br><br><label for="address">address</label>
        <input type="text" name="address">
        <br><br><label for="text">text</label>
        <input type="text" name="text">
        <br><br><label for="image">image</label>
        <input type="file" name="image">
        <br><br>
        <input type="submit" value="Create" class="btn btn-light">
        <br><br>
    </form>

@endsection