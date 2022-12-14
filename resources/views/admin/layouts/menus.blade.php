<li class="nav-item">
    <a href="{{route('admin.index')}}" class="nav-link @if (request()->is('admin')) active @endif">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        <p>
            Dashboard
        </p>
    </a>
</li>
<li class="nav-item">
    <a href="{{route('admin.info.index')}}" class="nav-link @if (request()->is('admin/info*')) active @endif">
        <i class="nav-icon fas fa-info-circle"></i>
        <p>
            Basic information
        </p>
    </a>
</li>
<li class="nav-item">
    <a href="{{route('admin.links.index')}}" class="nav-link @if (request()->is('admin/links*')) active @endif">
        <i class="nav-icon fas fa-link"></i>
        <p>
            Links
        </p>
    </a>
</li>
<li class="nav-item">
    <a href="{{route('admin.skills.index')}}" class="nav-link @if (request()->is('admin/skills*')) active @endif">
        <i class="nav-icon fas fa-tasks"></i>
        <p>
            Skillz
        </p>
    </a>
</li>
<li class="nav-item">
    <a href="{{route('admin.works.index')}}" class="nav-link @if (request()->is('admin/works*')) active @endif">
        <i class="nav-icon fas fa-laptop-house"></i>
        <p>
            Works
        </p>
    </a>
</li>
<li class="nav-item">
    <a href="{{route('admin.projects.index')}}" class="nav-link @if (request()->is('admin/projects*')) active @endif">
        <i class="nav-icon fas fa-trophy"></i>
        <p>
            Projects
        </p>
    </a>
</li>
{{-- <li class="nav-item menu-open">
    <a href="#" class="nav-link active">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        <p>
            Dashboard
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="./index.html" class="nav-link active">
                <i class="far fa-circle nav-icon"></i>
                <p>Dashboard v1</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="./index2.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Dashboard v2</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="./index3.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Dashboard v3</p>
            </a>
        </li>
    </ul>
</li> --}}
