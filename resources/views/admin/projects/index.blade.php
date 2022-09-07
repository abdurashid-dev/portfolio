@extends('admin.layouts.app')
@section('title')
    Projects
@endsection
@section('content')
    <x-header title="Projects" icon="fas fa-trophy"/>
    <div class="card">
        <div class="card-header">
            <a href="{{route('admin.projects.create')}}" class="btn btn-primary float-right"><i class="fas fa-plus"></i>
                Create new</a>
        </div>
        <div class="card-body table-responsive">
            <table class="table table-bordered">
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Live demo</th>
                    <th>Actions</th>
                </tr>
                @forelse($projects as $project)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$project->title}}</td>
                        <td><a href="{{$project->demo_url}}">{{$project->demo_url}}</a></td>
                        <td>
                            <a href="{{route('admin.projects.show', $project)}}" class="btn btn-primary"><i
                                    class="fas fa-eye"></i></a>
                            <a href="{{route('admin.projects.edit', $project)}}" class="btn btn-success"><i
                                    class="fas fa-pencil-alt"></i></a>
                            <form action="{{route('admin.projects.destroy', $project)}}" method="POST"
                                  class="d-inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">
                                    <i
                                        class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">No data found</td>
                    </tr>
                @endforelse
            </table>
        </div>
    </div>
@endsection
