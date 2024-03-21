<div class="main-sidebar sidebar-style-2">

    @if (Session::get('isAuthenticated')==true && Session::get('role')==4)
            <aside id="sidebar-wrapper">
                <div class="sidebar-brand">
                    
                    <a href="#">SmartLearn  | STUDENT</a>
                </div>
                <div class="sidebar-brand sidebar-brand-sm">
                    <a href="#">SL</a>
                </div>
                <ul class="sidebar-menu">
 
                    <li>
                        <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Dashboard</span></a>
                        <ul class="dropdown-menu">
                            <li><a class="nav-link" href="{{ route('studentdashboard') }}">My Dashboard</a></li>
                            <li><a class="nav-link beep beep-sidebar" href="{{ route('studentstatus') }}">My Status</a></li>    
                        </ul>
                    </li>
                    <li class="menu-header">CLASSROOM</li>
                    <li class="dropdown">
                        <a href="#" class="nav-link has-dropdown"><i class="fas fa-book"></i> <span>Courses</span></a>
                        <ul class="dropdown-menu">
                            <li><a class="nav-link" href="{{ route('studentenrollcourse') }}">Course Enrollment</a></li>
                        </ul>
                        <li><a href="{{ route('mystudentclasses') }}"><i class="fas fa-chalkboard-teacher"></i><span>My Classes</span></a></li>
                        {{-- <li><a href="{{ route('comingsoon') }}"><i class="fas fa-calendar"></i><span>My Schedule</span></a></li> --}}
                    </li>
                    <li class="menu-header">OPTIONS</li>
                    <li class="dropdown">
                        <a href="#" class="nav-link has-dropdown"><i class="fas fa-user"></i> <span>Profile Settings</span></a>
                        <ul class="dropdown-menu">
                            <li><a class="nav-link" href="{{ route('studentprofileinfo') }}">Profile Info</a></li>
                            {{-- <li><a class="nav-link" href="{{ route('comingsoon') }}">Profile Status</a></li> --}}
                        </ul>
                        <a href="{{ route('logout') }}" class="nav-link"><i class="fas fa-power-off"></i> <span>Logout</span></a>
                    </li>
                </ul>
            </aside>
    @elseif(Session::get('isAuthenticated')==true && Session::get('role')==3)
            <aside id="sidebar-wrapper">
                <div class="sidebar-brand">
                    
                    <a href="#">SmartLearn  | LECTURER</a>
                </div>
                <div class="sidebar-brand sidebar-brand-sm">
                    <a href="#">SL</a>
                </div>
                <ul class="sidebar-menu">
                    <li class="menu-header">Dashboard</li>
                    <li class="dropdown">
                        <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Dashboard</span></a>
                        <ul class="dropdown-menu">
                            <li><a class="nav-link" href="{{ route('lecturerdashboard') }}">My Dashboard</a></li>
                            <li><a class="nav-link" href="{{ route('status') }}">My Status</a></li>
                            
                        </ul>
                    </li>
                    <li class="menu-header">CLASSROOM</li>
                    <li class="dropdown">
                        <a href="#" class="nav-link has-dropdown"><i class="fas fa-book"></i> <span>Courses</span></a>
                        <ul class="dropdown-menu">
                            <li><a class="nav-link" href="{{ route('enrollcourse') }}">Course Enrollment</a></li>
                        </ul>
                        <li><a href="{{ route('myclasses') }}"><i class="fas fa-chalkboard-teacher"></i> <span>My Classes</span></a></li>
                    </li>
                    {{-- <li><a href="{{ route('comingsoon') }}"><i class="fas fa-calendar"></i><span>My Schedule</span></a></li> --}}
                    <li class="dropdown">
                        <a href="#" class="nav-link has-dropdown"><i class="far fa-file-alt"></i> <span>My Students</span></a>
                        <ul class="dropdown-menu">
                            <li><a class="nav-link" href="{{ route('lectpendingopencourse') }}">Pending Students</a></li>
                        </ul>
                    </li>
                    <li class="menu-header">Options</li>
                    <li class="dropdown">
                        <a href="#" class="nav-link has-dropdown"><i class="fas fa-user"></i> <span>Profile Settings</span></a>
                        <ul class="dropdown-menu">
                            <li><a class="nav-link" href="{{ route('lecturerprofileinfo') }}">Profile Info</a></li>
                            {{-- <li><a class="nav-link" href="{{ route('comingsoon') }}">Profile Status</a></li> --}}
                        </ul>
                        <a href="{{ route('logout') }}" class="nav-link"><i class="fas fa-power-off"></i> <span>Logout</span></a>
                    </li>
            </aside>
    @elseif(Session::get('isAuthenticated')==true && Session::get('role')==2)
            <aside id="sidebar-wrapper">
                    <div class="sidebar-brand">
                        <a href="#">SmartLearn | ADMIN</a>
                    </div>
                    <div class="sidebar-brand sidebar-brand-sm">
                        <a href="#">SL</a>
                    </div>
                    <ul class="sidebar-menu">
                        <li class="menu-header">Dashboard</li>
                        <li class="dropdown">
                            <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Dashboard</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="index-0.html">Analytics</a></li>
                            </ul>
                        </li>
                        <li class="menu-header">School Management</li>
                        <li class="dropdown">
                            <a href="#" class="nav-link has-dropdown"><i class="fas fa-school"></i> <span>Schools</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="{{ route('newschool')}}">Add New School</a></li>
                                <li><a class="nav-link" href="{{ route('schoollist')}}">School List</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="nav-link has-dropdown"><i class="fas fa-building-user"></i> <span>Departments</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="{{ route('newdepartment')}}">Add New Department</a></li>
                                <li><a class="nav-link" href="{{ route('departmentlist')}}">Department List</a></li>
                            </ul>
                        </li>
                        
                        <li class="dropdown">
                            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-book"></i> <span>Majors | Course Of Study</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="{{ route('newmajor')}}">Upload Major</a></li>
                                
                                <li><a class="nav-link" href="{{ route('majorlist')}}">Major List</a></li>
                            </ul>
                        </li>

                        <li class="dropdown">
                            <a href="#" class="nav-link has-dropdown"><i class="fas fa-chalkboard-user"></i> <span>Courses</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="{{ route('newcourse') }}">Upload Course</a></li>
                                
                                <li><a class="nav-link" href="{{ route('courselist') }}">Course List</a></li>
                            </ul>
                        </li>
                        
                        <li class="menu-header">User Management</li>
                        <li class="dropdown">
                            <a href="#" class="nav-link has-dropdown"><i class="fas fa-chalkboard-user"></i> <span>Lecturers</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link beep beep-sidebar" href="{{ route('pendinglecturers')}}">Pending Lecturers</a></li>
                                <li><a class="nav-link" href="{{ route('enrollmentapprovals')}}">Course Approvals</a></li>

                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="nav-link has-dropdown"><i class="far fa-user"></i> <span>Students</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="{{ route('adminpendingstudents') }} ">Pending Students</a></li>
                            </ul>
                        </li>
                        
                        {{-- <li class="dropdown">
                            <a href="#" class="nav-link has-dropdown"><i class="fas fa-bicycle"></i> <span>Settings</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="{{ route('comingsoon')}} ">Profile</a></li>
                                <li><a class="nav-link" href="{{ route('comingsoon')}} ">Settings</a></li>
                            </ul>
                        </li> --}}
                    </ul>
            </aside>
    @else
    
    @endif
</div>