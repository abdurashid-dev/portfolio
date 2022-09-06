<div class="card">
    <div class="card-header">
        CV (resume)
        @if(!is_null($info))
            @if(!is_null($info->cv))
                <a href="{{asset('cv/'.$info->cv)}}" class="float-right"><i class="fas fa-file-pdf"></i> Download</a>
            @endif
        @endif
    </div>
    <div class="card-body">
        <form action="{{route('admin.info.cv.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="file" name="cv" class="form-control"><br>
            <input type="submit" class="btn btn-primary float-right">
        </form>
    </div>
</div>
