<a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
    <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas fa-laugh-wink"></i>
    </div>
    <div class="sidebar-brand-text mx-3">Admin <sup>2</sup></div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item active">
    <a class="nav-link" href="{{ route('dashboard') }}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    Post
</div>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse2"
        aria-expanded="true" aria-controls="collapse2">
        <i class="fas fa-fw fa-cog"></i>
        <span>Post</span>
    </a>
    <div id="collapse2" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{ route('show_post') }}">Show All</a>
            <a class="collapse-item" href="{{ route('add_post') }}">Add</a>
        </div>
    </div>
</li>
<!-- Divider -->
<hr class="sidebar-divider">
<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse3"
        aria-expanded="true" aria-controls="collapse3">
        <i class="fas fa-fw fa-cog"></i>
        <span>Category</span>
    </a>
    <div id="collapse3" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{ route('show_cat') }}">Show All</a>
            <a class="collapse-item" href="{{ route('add_cat') }}">Add</a>
        </div>
    </div>
</li>
<!-- Divider -->
<hr class="sidebar-divider">
<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse4"
        aria-expanded="true" aria-controls="collapse4">
        <i class="fas fa-fw fa-cog"></i>
        <span>Tag</span>
    </a>
    <div id="collapse4" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{ route('tag.index') }}">Show All</a>
            <a class="collapse-item" href="{{ route('tag.create') }}">Add</a>
        </div>
    </div>
</li>
<!-- Divider -->
@if((Auth::user()->role_id==0))
<hr class="sidebar-divider">
<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse6"
        aria-expanded="true" aria-controls="collapse6">
        <i class="fas fa-fw fa-cog"></i>
        <span>Role</span>
    </a>
    <div id="collapse6" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{ route('role.index') }}">Show All</a>
            <a class="collapse-item" href="{{ route('role.create') }}">Add</a>
        </div>
    </div>
</li>
<!-- Divider -->
<hr class="sidebar-divider">
<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse5"
        aria-expanded="true" aria-controls="collapse5">
        <i class="fas fa-fw fa-cog"></i>
        <span>User</span>
    </a>
    <div id="collapse5" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{ route('user.index') }}">Show All</a>
            <a class="collapse-item" href="{{ route('user.create') }}">Add</a>
        </div>
    </div>
</li>
@endif
<!-- Divider -->
<hr class="sidebar-divider">
<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>


</ul>
