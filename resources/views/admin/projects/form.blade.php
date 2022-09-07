<div class="mb-3">
    <label for="titleInput" class="form-label">Title</label>
    <input type="text" class="form-control" id="titleInput" name="title" value="{{$work->title ?? old('title')}}">
    @error('title')
    <span class="text-danger">{{$message}}</span>
    @enderror
</div>
<div class="mb-3">
    <label for="timeInput" class="form-label">Time interval</label>
    <input type="text" class="form-control" id="timeInput" name="time" value="{{$work->time ?? old('time')}}">
    @error('time')
    <span class="text-danger">{{$message}}</span>
    @enderror
</div>
<div class="mb-3">
    <textarea name="desc" id="summernote">{{$work->desc ?? old('desc')}}</textarea>
    @error('desc')
    <span class="text-danger">{{$message}}</span>
    @enderror
</div>
<button type="submit" class="btn btn-primary float-right">Submit</button>
