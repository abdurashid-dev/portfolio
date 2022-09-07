@extends('admin.layouts.app')
@section('title')
    Create project
@endsection
@section('styles')
    <link rel="stylesheet" href="{{asset('includes/plugins/summernote/summernote-bs4.min.css')}}">
@endsection
@section('content')
    <x-headers title="Create" parent="Projects" parentIcon="fas fa-trophy" parentRoute="admin.projects.index"/>
    <div class="card">
        <div class="card-body">
            <form action="{{route('admin.projects.store')}}" method="POST">
                @csrf
                @include('admin.projects.form')
            </form>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{asset('includes/plugins/summernote/summernote-bs4.min.js')}}"></script>
    <script>
        $(function () {
            // Summernote
            $('#summernote').summernote({
                placeholder: 'Description',
                height: 150
            })
        })
    </script>
@endsection
