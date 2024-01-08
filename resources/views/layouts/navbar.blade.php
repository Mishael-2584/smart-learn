<nav class="navbar navbar-expand-lg main-navbar">
    <form class="form-inline mr-auto">
    <ul class="navbar-nav mr-3">
        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
        <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
    </ul>
    <div class="search-element">
        <input class="form-control" type="search" placeholder="Search" aria-label="Search" data-width="250">
        <button class="btn" type="submit"><i class="fas fa-search"></i></button>
        <div class="search-backdrop"></div>
        <div class="search-result">
        <div class="search-header">
            Histories
        </div>
        <div class="search-item">
            <a href="#">How to register for a class</a>
            <a href="#" class="search-close"><i class="fas fa-times"></i></a>
        </div>
        <div class="search-item">
            <a href="#">Kodinger.com</a>
            <a href="#" class="search-close"><i class="fas fa-times"></i></a>
        </div>
        <div class="search-item">
            <a href="#">#SMARTLEARN</a>
            <a href="#" class="search-close"><i class="fas fa-times"></i></a>
        </div>
        <div class="search-header">
            Result
        </div>
        <div class="search-item">
            <a href="#">
            <img class="mr-3 rounded" width="30" src="{{ asset('codiepie/assets/img/products/product-3-50.png') }}" alt="product">
            oPhone S9 Limited Edition
            </a>
        </div>
        <div class="search-item">
            <a href="#">
            <img class="mr-3 rounded" width="30" src="{{ asset('codiepie/assets/img/products/product-2-50.png') }}" alt="product">
            Drone X2 New Gen-7
            </a>
        </div>
        <div class="search-item">
            <a href="#">
            <img class="mr-3 rounded" width="30" src="{{ asset('codiepie/assets/img/products/product-1-50.png') }}" alt="product">
            Headphone Blitz
            </a>
        </div>
        <div class="search-header">
            Projects
        </div>
        <div class="search-item">
            <a href="#">
            <div class="search-icon bg-danger text-white mr-3">
                <i class="fas fa-code"></i>
            </div>
            SMARTLEARN
            </a>
        </div>
        <div class="search-item">
            <a href="#">
            <div class="search-icon bg-primary text-white mr-3">
                <i class="fas fa-laptop"></i>
            </div>
            Create a new Homepage Design
            </a>
        </div>
        </div>
    </div>
    </form>
    {{-- Notification Section --}}


    <ul class="navbar-nav navbar-right">
        @if (Session::get('isAuthenticated')==true && Session::get('role')==4)
        <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg beep"><i class="far fa-bell"></i></a>
        @elseif(Session::get('isAuthenticated')==true && Session::get('role')==3)
        <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg beep"><i class="far fa-bell"></i></a>
        @else
        <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg beep"><i class="far fa-bell"></i></a>
        @endif
        
            <div class="dropdown-menu dropdown-list dropdown-menu-right">
            <div class="dropdown-header">Notifications
                <div class="float-right">
                <a href="#">Mark All As Read</a>
                </div>
            </div>
            <div class="dropdown-list-content dropdown-list-icons">
                <a href="#" class="dropdown-item dropdown-item-unread">
                <div class="dropdown-item-icon bg-primary text-white">
                    <i class="fas fa-code"></i>
                </div>
                <div class="dropdown-item-desc">
                    Template update is available now!
                    <div class="time text-primary">2 Min Ago</div>
                </div>
                </a>
                <a href="#" class="dropdown-item">
                <div class="dropdown-item-icon bg-info text-white">
                    <i class="far fa-user"></i>
                </div>
                <div class="dropdown-item-desc">
                    <b>You</b> and <b>Dedik Sugiharto</b> are now friends
                    <div class="time">10 Hours Ago</div>
                </div>
                </a>
                <a href="#" class="dropdown-item">
                <div class="dropdown-item-icon bg-success text-white">
                    <i class="fas fa-check"></i>
                </div>
                <div class="dropdown-item-desc">
                    <b>Kusnaedi</b> has moved task <b>Fix bug header</b> to <b>Done</b>
                    <div class="time">12 Hours Ago</div>
                </div>
                </a>
                <a href="#" class="dropdown-item">
                <div class="dropdown-item-icon bg-danger text-white">
                    <i class="fas fa-exclamation-triangle"></i>
                </div>
                <div class="dropdown-item-desc">
                    Low disk space. Let's clean it!
                    <div class="time">17 Hours Ago</div>
                </div>
                </a>
                <a href="#" class="dropdown-item">
                <div class="dropdown-item-icon bg-info text-white">
                    <i class="fas fa-bell"></i>
                </div>
                <div class="dropdown-item-desc">
                    Welcome to CodiePie template!
                    <div class="time">Yesterday</div>
                </div>
                </a>
            </div>
            <div class="dropdown-footer text-center">
                <a href="#">View All <i class="fas fa-chevron-right"></i></a>
            </div>
            </div>
        </li>
        <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <figure class="avatar mr-2 bg-purple text-white" data-initial="{{ strtoupper(substr($user->name, 0, 1)) }}{{ strtoupper(substr(strstr($user->name, ' '), 1, 1)) }}"></figure>
            <div class="d-sm-none d-lg-inline-block">
                Hi, @isset($user){{$user->name}}@endisset
                @if(isset($user) && ($user->role->id == 3 || $user->role->id == 4) && (($user->status == 2) ||($user->verified == 2)))
                    <span class="badge badge-success rounded-circle p-0" style="background-color: transparent;" title="Verified">
                        <i class="fas fa-check-circle fa-lg text-success"></i>
                    </span>
                @elseif(isset($user) && ($user->role->id == 3||$user->role->id == 4) && (($user->status == 1) ||($user->verified == 1)))
                    
                    <span class="badge badge-warning rounded-circle p-0" style="background-color: transparent;" title="Pending Approval">
                        <i class="fas fa-clock fa-lg text-warning"></i>
                    </span>

                @elseif(isset($user) && ($user->role->id == 3||$user->role->id == 4) && (($user->status == 0) || ($user->verified == 0)))
                    <span class="badge badge-danger rounded-circle p-0" style="background-color: transparent;" title="Not Verified">
                        <i class="fas fa-times-circle fa-lg text-danger"></i>
                    </span>
                @endif
            </div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
            <div class="dropdown-title">Logged in 5 min ago</div>

            @if (Session::get('isAuthenticated')==true && Session::get('role')==4)
            <a href="{{ route('studentprofileinfo') }}" class="dropdown-item has-icon">
                <i class="far fa-user"></i> Profile
            </a>
            <a href="{{ route('comingsoon') }}" class="dropdown-item has-icon">
                <i class="fas fa-bolt"></i> Activities
            </a>
            <a href="{{ route('comingsoon') }}" class="dropdown-item has-icon">
                <i class="fas fa-cog"></i> Settings
            </a>
            
            @elseif(Session::get('isAuthenticated')==true && Session::get('role')==3)
            <a href="{{ route('lecturerprofileinfo') }}" class="dropdown-item has-icon">
                <i class="far fa-user"></i> Profile
            </a>
            <a href="{{ route('comingsoon') }}" class="dropdown-item has-icon">
                <i class="fas fa-bolt"></i> Activities
            </a>
            <a href="{{ route('comingsoon') }}" class="dropdown-item has-icon">
                <i class="fas fa-cog"></i> Settings
            </a>
            @else
            <a href="features-profile.html" class="dropdown-item has-icon">
                <i class="far fa-user"></i> Profile
            </a>
            <a href="{{ route('comingsoon') }}" class="dropdown-item has-icon">
                <i class="fas fa-bolt"></i> Activities
            </a>
            <a href="features-settings.html" class="dropdown-item has-icon">
                <i class="{{ route('comingsoon') }}"></i> Settings
            </a>
            @endif
            <div class="dropdown-divider"></div>
            <a href="{{ route('logout') }}" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
            </a>
            </div>
        </li>
        
    </ul>
</nav>    

