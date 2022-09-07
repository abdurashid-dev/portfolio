@extends('admin.layouts.app')
@section('title')
    Create work
@endsection
@section('styles')
    <link rel="stylesheet" href="{{asset('includes/plugins/summernote/summernote-bs4.min.css')}}">
@endsection
@section('content')
    <x-headers title="Create" parent="Works" parentIcon="fas fa-laptop-house" parentRoute="admin.works.index"/>
    <div class="card">
        <div class="card-body">
            <form action="{{route('admin.works.store')}}" method="POST">
                @csrf
                @include('admin.works.form')
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
