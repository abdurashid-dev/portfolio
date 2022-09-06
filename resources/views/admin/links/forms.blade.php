<div class="row">
    <div class="col-md-6 col-sm-12">
        <div class="mb-3">
            <label for="titleInput" class="form-label">Title</label>
            <input type="text" class="form-control" id="titleInput" name="title" value="{{$link->title ?? old('title')}}">
        </div>
    </div>
    <div class="col-md-6 col-sm-12">
        <div class="mb-3">
            <label for="urlInput" class="form-label">URL</label>
            <input type="text" class="form-control" id="urlInput" name="url" value="{{$link->url ?? old('url')}}">
        </div>
    </div>
</div>
<input type="submit" class="btn btn-primary float-right" value="Save">
