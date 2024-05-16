@extends('layouts.app')
@section('title',$viewData['title'])
@section('subtitle',$viewData['subtitle'])
@section('content')
<div class = "container">
    <img src="{{asset('storage/sdc.jpg')}}" alt="">
</div>
@endsection