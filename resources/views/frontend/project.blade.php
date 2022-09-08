@extends('frontend.layout')
@section('content')
    <div id="container--main">
        <a href="{{route('home')}}">&#x2190; Go Back</a>
        <h1>{{$project->title}}</h1>

        <ul>
            <li><a href="{{$project->demo_url}}">Live Demo</a></li>
            <li><a href="{{$project->code_url}}">Source code</a></li>
        </ul>
        <p>{!! $project->desc !!}</p>
    </div>
@endsection
