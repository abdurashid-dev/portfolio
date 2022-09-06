<div class="card card-primary card-outline">
    <div class="card-header">
        Avatar
    </div>
    <div class="card-body box-profile">
        <div class="text-center">
            <img class="profile-user-img img-fluid img-circle"
                 style="width: 200px; height: 200px"
                 src="
                 @if(!is_null($info))
                    @if(!is_null($info->avatar))
                        {{asset($info->avatar)}}
                    @else
                        {{asset('defaultAvatar.png')}}
                    @endif
                 @else
                    {{asset('defaultAvatar.png')}}
                 @endif
                 "
                 alt="User profile picture">
        </div>
        <br>
        <form action="">
            <div class="mb-3">
                <input class="form-control" type="file">
            </div>
            <input type="submit" class="btn btn-primary float-right" value="Save">
        </form>
    </div>
</div>
