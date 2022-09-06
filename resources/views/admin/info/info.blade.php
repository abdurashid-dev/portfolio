<div class="card card-primary card-outline">
    <div class="card-header">
        Basic information
    </div>
    <div class="card-body">
        <form action="{{route('admin.info.store')}}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="fullnameInput" class="form-label">Fullname</label>
                <input type="text" class="form-control" id="fullnameInput" name="fullname" value="@if(!is_null($info)) {{$info->fullname}} @endif">
            </div>
            <div class="mb-3">
                <label for="emailInput" class="form-label">Email</label>
                <input type="email" class="form-control" id="emailInput" name="email" value="@if(!is_null($info)) {{$info->email}} @endif">
            </div>
            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea class="form-control" name="desc" style="height: 100px">@if(!is_null($info)) {{$info->desc}} @endif</textarea>
            </div>
            <button type="submit" class="btn btn-primary float-right">Save</button>
        </form>
    </div>
</div>
