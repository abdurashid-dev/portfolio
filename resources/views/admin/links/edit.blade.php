@extends('admin.layouts.app')
@section('title')
    Edit link
@endsection
@section('content')
    <x-headers title="Edit link" parentRoute="admin.links.index" parent="Links" parentIcon="fas fa-link"/>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="card">
        <div class="card-body">
            <form action="{{route('admin.links.update', $link)}}" method="POST">
                @csrf
                @method('PUT')
                @include('admin.links.forms')
            </form>
        </div>
    </div>
@endsection
