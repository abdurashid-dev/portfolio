@extends('admin.layouts.app')
@section('title')
    Works
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
                <div class="mb-3">
                    <label for="titleInput" class="form-label">Title</label>
                    <input type="text" class="form-control" id="titleInput" name="title">
                    @error('title')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="timeInput" class="form-label">Time interval</label>
                    <input type="text" class="form-control" id="timeInput" name="time">
                    @error('time')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <textarea name="desc" id="summernote"></textarea>
                    @error('desc')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
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
