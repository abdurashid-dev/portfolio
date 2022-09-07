@extends('admin.layouts.app')
@section('title')
    Show work
@endsection
@section('content')
    <x-headers title="{{$work->title}}" icon="fas fa-eye" parent="Works" parentIcon="fas fa-laptop-house"
               parentRoute="admin.works.index"/>
    <div class="card">
        <div class="card-header">
            <a href="{{route('admin.works.edit', $work)}}" class="btn btn-success"><i class="fas fa-pencil-alt"></i> Edit</a>
            <form action="{{route('admin.works.destroy', $work)}}" class="d-inline-block" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" type="submit" onclick="return confirm('Are you sure man???')"><i class="fas fa-trash"></i> Delete</button>
            </form>
        </div>
        <div class="card-body table-responsive">
            <table class="table table-bordered">
                <tr>
                    <th>ID</th>
                    <td>{{$work->id}}</td>
                </tr>
                <tr>
                    <th>Title</th>
                    <td>{{$work->title}}</td>
                </tr>
                <tr>
                    <th>Time interval</th>
                    <td>{{$work->time}}</td>
                </tr>
                <tr>
                    <th>Comment</th>
                    <td>{!! $work->desc !!}</td>
                </tr>
            </table>
        </div>
    </div>
@endsection
