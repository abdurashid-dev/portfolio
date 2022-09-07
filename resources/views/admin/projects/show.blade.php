@extends('admin.layouts.app')
@section('title')
    Show project
@endsection
@section('content')
    <x-headers title="{{$project->title}}" icon="fas fa-eye" parent="Projects" parentIcon="fas fa-trophy"
               parentRoute="admin.projects.index"/>
    <div class="card">
        <div class="card-header">
            <a href="{{route('admin.projects.edit', $project)}}" class="btn btn-success"><i
                    class="fas fa-pencil-alt"></i> Edit</a>
            <form action="{{route('admin.projects.destroy', $project)}}" class="d-inline-block" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" type="submit" onclick="return confirm('Are you sure man???')"><i
                        class="fas fa-trash"></i> Delete
                </button>
            </form>
        </div>
        <div class="card-body table-responsive">
            <table class="table table-bordered">
                <tr>
                    <th>ID</th>
                    <td>{{$project->id}}</td>
                </tr>
                <tr>
                    <th>Title</th>
                    <td>{{$project->title}}</td>
                </tr>
                <tr>
                    <th>Live demo</th>
                    <td><a href="{{$project->demo_url}}">{{$project->demo_url}}</a></td>
                </tr>
                <tr>
                    <th>Source code</th>
                    <td><a href="{{$project->code_url}}">{{$project->code_url}}</a></td>
                </tr>
                <tr>
                    <th>Description</th>
                    <td>{!! $project->desc !!}</td>
                </tr>
            </table>
        </div>
    </div>
@endsection
