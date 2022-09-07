@extends('admin.layouts.app')
@section('title')
    Skills
@endsection
@section('content')
    <x-header title="Skills" icon="fa fa-php"/>
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
        <div class="card-header">
            <button type="button" class="btn btn-primary float-right" data-bs-toggle="modal" data-bs-target="#create">
                <i class="fas fa-plus"></i> Create new
            </button>
        </div>
        <div class="card-body table-responsive">
            <table class="table table-bordered">
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Actions</th>
                </tr>
                @forelse($skills as $skill)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$skill->title}}</td>
                        <td>
                            <form action="{{route('admin.skills.destroy', $skill)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center">No data found</td>
                    </tr>
                @endforelse
            </table>
        </div>
    </div>
    @include('admin.skills.create')
@endsection
