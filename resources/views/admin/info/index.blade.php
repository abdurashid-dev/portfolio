@extends('admin.layouts.app')
@section('title')
    Basic Information
@endsection
@section('content')
    <x-header title="Basic Information" icon="fas fa-info"/>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="row">
        <div class="col-md-5 col-sm-12">
            @include('admin.info.avatar')
        </div>
        <div class="col-md-7 col-sm-12">
            @include('admin.info.info')
        </div>
    </div>
@endsection
