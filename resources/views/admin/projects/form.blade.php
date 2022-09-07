<div class="mb-3">
    <label for="titleInput" class="form-label">Title</label>
    <input type="text" class="form-control" id="titleInput" name="title" value="{{$project->title ?? old('title')}}">
    @error('title')
    <span class="text-danger">{{$message}}</span>
    @enderror
</div>
<div class="mb-3">
    <label for="demoUrlInput" class="form-label">Live demo url</label>
    <input type="text" class="form-control" id="demoUrlInput" name="demo_url"
           value="{{$project->demo_url ?? old('demo_url')}}">
    @error('demo_url')
    <span class="text-danger">{{$message}}</span>
    @enderror
</div>
<div class="mb-3">
    <label for="codeUrlInput" class="form-label">Code url</label>
    <input type="text" class="form-control" id="codeUrlInput" name="code_url"
           value="{{$project->code_url ?? old('code_url')}}">
    @error('code_url')
    <span class="text-danger">{{$message}}</span>
    @enderror
</div>
<div class="mb-3">
    <textarea name="desc" id="summernote">{{$project->desc ?? old('desc')}}</textarea>
    @error('desc')
    <span class="text-danger">{{$message}}</span>
    @enderror
</div>
<button type="submit" class="btn btn-primary float-right">Submit</button>
