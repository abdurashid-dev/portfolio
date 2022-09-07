@extends('admin.layouts.app')
@section('title')
    Works
@endsection
@section('content')
    <x-header title="works" icon="fas fa-laptop-house"/>
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
                        <th>{{$loop->iteration}}</th>
                        <th>{{$work->title}}</th>
                        <th>{{$work->time}}</th>
                        <th>
                            <a href="{{route('admin.works.show', $work)}}" class="btn btn-primary"><i
                                    class="fas fa-eye"></i></a>
                            <a href="{{route('admin.works.edit', $work)}}" class="btn btn-success"><i
                                    class="fas fa-pencil-alt"></i></a>
                            <form action="{{route('admin.works.destroy', $work)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                            </form>
                        </th>
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
