@extends('admin.layouts.app')
@section('title')
    Links
@endsection
@section('content')
    <x-header title="Links" icon="fas fa-link"/>
    <div class="card">
        <div class="card-header">
            <a href="{{route('admin.links.create')}}" class="btn btn-primary float-right">Create new</a>
        </div>
        <div class="card-body table-responsive">
            <table class="table table-bordered">
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Url</th>
                    <th>Actions</th>
                </tr>
                @forelse($links as $link)
                    <tr>
                        <td>{{(($links->currentpage()-1)*$links->perpage()+($loop->index+1))}}</td>
                        <td>{{$link->title}}</td>
                        <td><a href="{{$link->url}}">{{Str::limit($link->url, 20)}}</a></td>
                        <td class="d-flex">
                            <a href="{{route('admin.links.edit', $link)}}"
                               class="btn btn-success d-inline-block mr-3"><i
                                    class="fas fa-pencil-alt"></i></a>
                            <form action="{{route('admin.links.destroy', $link)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger d-inline-block">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">No data found</td>
                    </tr>
                @endforelse
            </table>
            <br>
            <div class="float-right">
                {{$links->links()}}
            </div>
        </div>
    </div>
@endsection
