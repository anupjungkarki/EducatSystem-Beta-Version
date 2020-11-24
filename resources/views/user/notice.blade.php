@extends('layouts.user.app')
@section('content')


<div class="timeline">
  <div class="container">

 @foreach ($getnotices as $data)
  <li>
    <div class="content">
      <h3 class="float-right">{{$data->date_of_notice}}</h3>
     <center><h4>Title: <span> {{$data->notice_title}}</span></h4></center>
      <h5>Subject:{{$data->notice_subject}}</h5>
      <p>{{$data->description}}</p>
    </div>
  </li>
  @endforeach
  </div>


@endsection