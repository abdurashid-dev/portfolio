@extends('admin.layouts.app')
@section('title')
    Works
@endsection
@section('content')
    <x-header title="Works" icon="fas fa-laptop-house"/>
    <div class="card">
        <div class="card-header">
            <a href="{{route('admin.works.create')}}" class="btn btn-primary float-right"><i class="fas fa-plus"></i>
                Create new</a>
        </div>
        <div class="card-body table-responsive">
            <table class="table table-bordered">
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Time interval</th>
                    <th>Actions</th>
                </tr>
                @forelse($works as $work)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$work->title}}</td>
                        <td>{{$work->time}}</td>
                        <td>
                            <a href="{{route('admin.works.show', $work)}}" class="btn btn-primary"><i
                                    class="fas fa-eye"></i></a>
                            <a href="{{route('admin.works.edit', $work)}}" class="btn btn-success"><i
                                    class="fas fa-pencil-alt"></i></a>
                            <form action="{{route('admin.works.destroy', $work)}}" method="POST" class="d-inline-block">
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
