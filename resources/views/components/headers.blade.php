<div class="row mb-2">
    <div class="col-sm-6">
        <h3 class="m-0 text-dark">{{$title}}</h3>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="fas fa-home"></i> {{__('words.dashboard')}}</a>
            </li>
            <li class="breadcrumb-item"><a href="{{ route($parentRoute) }}"><i class="{{$parentIcon}}"></i> {{$parent}}</a></li>
            <li class="breadcrumb-item active"><i class="{{ isset($icon) ? $icon: 'fas fa-pencil-alt'}}"></i> {{$title}}
            </li>
        </ol>
    </div>
</div>
