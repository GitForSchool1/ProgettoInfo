@extends('layouts.app')
@section('title',$viewData['title']) 
@section('subtitle',$viewData['subtitle'])
@section('content')
<div class = "container">
    <div class = "row">
        <div class = "col-lg-4 ms-auto">
            <p class = "lead"> {{$viewData['description']}} </p>
        </div>
        <div class = "col-lg-4 me-auto">
            <p class = "lead"> {{$viewData['author']}} </p>
        </div>
    </div>
</div>
<a href="https://x.com/BigNerdBoy">Puzzo Fabio</a>
<br>
<a href="https://www.instagram.com/kevinandrei_05">Tunaru Kevin Andrei</a>
<form action="{{route("bro.wtf")}}" method="post">
    @csrf
    <button type="submit" class="btn bg-secondary text-white">
        Silkroad
    </button>
</form>
@endsection