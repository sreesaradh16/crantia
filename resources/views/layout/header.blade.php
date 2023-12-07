<div class="page-header">
    <a aria-label="Hide Sidebar" class="app-sidebar__toggle close-toggle" data-toggle="sidebar" href="#"></a><!-- sidebar-toggle-->
    <div>
        <h1 class="page-title">{{ ucfirst($title) ?? ''}}</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ ucfirst($title) ?? ''}}</li>
        </ol>
    </div>
    <div class="d-flex  ml-auto header-right-icons header-search-icon">

        <!-- FULL-SCREEN -->
        <div class="dropdown profile-1">
            <a href="#" data-toggle="dropdown" class="nav-link pr-2 leading-none d-flex">
                <span>
                    <img src="{{asset('assets/images/avatar.png')}}" alt="profile-user" class="avatar  profile-user brround cover-image">
                </span>
            </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                <div class="drop-heading">
                    <div class="text-center">
                        <h5 class="text-dark mb-0">{{ ucfirst(auth()->user()->name) }}</h5>
                        <small class="text-muted">{{ ucfirst(auth()->user()->email) }}</small>
                    </div>
                </div>
                <div class="dropdown-divider m-0"></div>
                <a class="dropdown-item" href="{{route('logout')}}">
                    <i class="dropdown-icon mdi  mdi-logout-variant"></i> Sign Out
                </a>
            </div>
        </div>
    </div>
</div>