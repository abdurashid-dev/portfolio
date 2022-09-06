@extends('admin.layouts.app')
@section('title')
    Basic Information
@endsection
@section('content')
    <x-header title="Basic Information" icon="fas fa-info"/>
    <div class="row">
        <div class="col-md-5 col-sm-12">
            @include('admin.info.avatar')
        </div>
        <div class="col-md-7 col-sm-12">
            @include('admin.info.info')
        </div>
    </div>
@endsection
