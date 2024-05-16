@extends('layouts.app')
@section('title',$viewData["title"]) 
@section('content')
<div class = "row">
    <div class = "col-md-6 col-lg-4 mb-2">
        <img src = "{{ asset('/storage/27.png')}}">
    </div>

    <div class = "col-md-6 col-lg-4 mb-2">
        <img src = "{{ asset('/storage/28.png')}}">
    </div>

    <div class = "col-md-6 col-lg-4 mb-2">
        <img src = "{{ asset('/storage/29.png')}}">
    </div>
</div>
@endsection
