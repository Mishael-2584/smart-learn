<div class="main-sidebar sidebar-style-2">



    @if (Session::get('isAuthenticated')==true && Session::get('role')==4)
            <aside id="sidebar-wrapper">
                <div class="sidebar-brand">
                    <img src="{{ asset("codiepie/assets/img/smartlearn-logo/svg/logonew.svg") }}SL" alt="SMARTLEARN">
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
                    <li class="menu-header">Starter</li>
                    <li class="dropdown">
                        <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Layout</span></a>
                        <ul class="dropdown-menu">
                            <li><a class="nav-link" href="layout-default.html">Default Layout</a></li>
                            
                            <li><a class="nav-link" href="layout-top-navigation.html">Top Navigation</a></li>
                        </ul>
                    </li>
                    <li class=active><a class="nav-link" href="blank.html"><i class="far fa-square"></i> <span>Blank Page</span></a></li>
                    <li class="dropdown">
                        <a href="#" class="nav-link has-dropdown"><i class="fas fa-th"></i> <span>Bootstrap</span></a>
                        <ul class="dropdown-menu">
                            <li><a class="nav-link" href="bootstrap-alert.html">Alert</a></li>
                            <li><a class="nav-link" href="bootstrap-badge.html">Badge</a></li>
                            <li><a class="nav-link" href="bootstrap-breadcrumb.html">Breadcrumb</a></li>
                            <li><a class="nav-link" href="bootstrap-buttons.html">Buttons</a></li>
                            <li><a class="nav-link" href="bootstrap-card.html">Card</a></li>
                            <li><a class="nav-link" href="bootstrap-carousel.html">Carousel</a></li>
                            <li><a class="nav-link" href="bootstrap-collapse.html">Collapse</a></li>
                            <li><a class="nav-link" href="bootstrap-dropdown.html">Dropdown</a></li>
                            <li><a class="nav-link" href="bootstrap-form.html">Form</a></li>
                            <li><a class="nav-link" href="bootstrap-list-group.html">List Group</a></li>
                            <li><a class="nav-link" href="bootstrap-media-object.html">Media Object</a></li>
                            <li><a class="nav-link" href="bootstrap-modal.html">Modal</a></li>
                            <li><a class="nav-link" href="bootstrap-nav.html">Nav</a></li>
                            <li><a class="nav-link" href="bootstrap-navbar.html">Navbar</a></li>
                            <li><a class="nav-link" href="bootstrap-pagination.html">Pagination</a></li>
                            <li><a class="nav-link" href="bootstrap-popover.html">Popover</a></li>
                            <li><a class="nav-link" href="bootstrap-progress.html">Progress</a></li>
                            <li><a class="nav-link" href="bootstrap-table.html">Table</a></li>
                            <li><a class="nav-link" href="bootstrap-tooltip.html">Tooltip</a></li>
                            <li><a class="nav-link" href="bootstrap-typography.html">Typography</a></li>
                        </ul>
                    </li>
                    <li class="menu-header">CodiePie</li>
                    <li class="dropdown">
                        <a href="#" class="nav-link has-dropdown"><i class="fas fa-th-large"></i> <span>Components</span></a>
                        <ul class="dropdown-menu">
                            <li><a class="nav-link" href="components-article.html">Article</a></li>
                            <li><a class="nav-link beep beep-sidebar" href="components-avatar.html">Avatar</a></li>
                            <li><a class="nav-link" href="components-chat-box.html">Chat Box</a></li>
                            <li><a class="nav-link beep beep-sidebar" href="components-empty-state.html">Empty State</a></li>
                            <li><a class="nav-link" href="components-gallery.html">Gallery</a></li>
                            <li><a class="nav-link beep beep-sidebar" href="components-hero.html">Hero</a></li>
                            <li><a class="nav-link" href="components-multiple-upload.html">Multiple Upload</a></li>
                            <li><a class="nav-link beep beep-sidebar" href="components-pricing.html">Pricing</a></li>
                            <li><a class="nav-link" href="components-statistic.html">Statistic</a></li>
                            <li><a class="nav-link" href="components-tab.html">Tab</a></li>
                            <li><a class="nav-link" href="components-table.html">Table</a></li>
                            <li><a class="nav-link" href="components-user.html">User</a></li>
                            <li><a class="nav-link beep beep-sidebar" href="components-wizard.html">Wizard</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="nav-link has-dropdown"><i class="far fa-file-alt"></i> <span>Forms</span></a>
                        <ul class="dropdown-menu">
                            <li><a class="nav-link" href="forms-advanced-form.html">Advanced Form</a></li>
                            <li><a class="nav-link" href="forms-editor.html">Editor</a></li>
                            <li><a class="nav-link" href="forms-validation.html">Validation</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="nav-link has-dropdown"><i class="fas fa-map-marker-alt"></i> <span>Google Maps</span></a>
                        <ul class="dropdown-menu">
                            <li><a href="gmaps-advanced-route.html">Advanced Route</a></li>
                            <li><a href="gmaps-draggable-marker.html">Draggable Marker</a></li>
                            <li><a href="gmaps-geocoding.html">Geocoding</a></li>
                            <li><a href="gmaps-geolocation.html">Geolocation</a></li>
                            <li><a href="gmaps-marker.html">Marker</a></li>
                            <li><a href="gmaps-multiple-marker.html">Multiple Marker</a></li>
                            <li><a href="gmaps-route.html">Route</a></li>
                            <li><a href="gmaps-simple.html">Simple</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="nav-link has-dropdown"><i class="fas fa-plug"></i> <span>Modules</span></a>
                        <ul class="dropdown-menu">
                            <li class="menu-sub-header">Apps</li>
                            <li><a class="nav-link" href="modules-calendar.html">Calendar</a></li>
                            
                            <li class="menu-sub-header">Charts</li>
                            <li><a class="nav-link" href="modules-chartjs.html">ChartJS</a></li>
                            <li><a class="nav-link" href="modules-apex-charts.html">Apex Charts</a></li>
                            <li><a class="nav-link" href="modules-e-charts.html">E Charts</a></li>
                            <li><a class="nav-link" href="modules-c3-charts.html">C3 Charts</a></li>
                            <li><a class="nav-link" href="modules-knob-charts.html">Knob Charts</a></li>
                            <li><a class="nav-link" href="modules-sparkline.html">Sparkline</a></li>
                            <li class="menu-sub-header">Tables</li>
                            <li><a class="nav-link" href="modules-datatables.html">DataTables</a></li>
                            <li><a class="nav-link" href="modules-table-more.html">More</a></li>
                            <li class="menu-sub-header">Font Icons</li>
                            <li><a class="nav-link" href="modules-font-awesome.html">Font Awesome</a></li>
                            <li><a class="nav-link" href="modules-line-icons.html">Line Icons</a></li>
                            <li><a class="nav-link" href="modules-feather-icons.html">Feather Icons</a></li>
                            <li><a class="nav-link" href="modules-ion-icons.html">Ion Icons</a></li>
                            <li><a class="nav-link" href="modules-flag.html">Flag</a></li>
                            <li><a class="nav-link" href="modules-weather-icon.html">Weather Icon</a></li>
                            <li class="menu-sub-header">Other</li>
                            <li><a class="nav-link" href="modules-owl-carousel.html">Owl Carousel</a></li>
                            <li><a class="nav-link" href="modules-sweet-alert.html">Sweet Alert</a></li>
                            <li><a class="nav-link" href="modules-toastr.html">Toastr</a></li>
                            <li><a class="nav-link" href="modules-vector-map.html">Vector Map</a></li>
                        </ul>
                    </li>
                    <li class="menu-header"></li>
                    <li class="dropdown">
                        <a href="#" class="nav-link has-dropdown"><i class="far fa-user"></i> <span>Auth</span></a>
                        <ul class="dropdown-menu">
                            <li><a href="auth-forgot-password.html">Forgot Password</a></li> 
                            <li><a href="auth-login.html">Login</a></li> 
                            <li><a href="auth-register.html">Register</a></li> 
                            <li><a href="auth-reset-password.html">Reset Password</a></li> 
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="nav-link has-dropdown"><i class="fas fa-exclamation"></i> <span>Errors</span></a>
                        <ul class="dropdown-menu">
                            <li><a class="nav-link" href="errors-503.html">503</a></li> 
                            <li><a class="nav-link" href="errors-403.html">403</a></li> 
                            <li><a class="nav-link" href="errors-404.html">404</a></li> 
                            <li><a class="nav-link" href="errors-500.html">500</a></li> 
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="nav-link has-dropdown"><i class="fas fa-bicycle"></i> <span>Features</span></a>
                        <ul class="dropdown-menu">
                            <li><a class="nav-link" href="features-activities.html">Activities</a></li>
                            <li><a class="nav-link" href="features-post-create.html">Post Create</a></li>
                            <li><a class="nav-link" href="features-posts.html">Posts</a></li>
                            <li><a class="nav-link" href="features-profile.html">Profile</a></li>
                            <li><a class="nav-link" href="features-settings.html">Settings</a></li>
                            <li><a class="nav-link" href="features-setting-detail.html">Setting Detail</a></li>
                            <li><a class="nav-link" href="features-tickets.html">Tickets</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="nav-link has-dropdown"><i class="fas fa-ellipsis-h"></i> <span>Utilities</span></a>
                        <ul class="dropdown-menu">
                            <li><a href="utilities-contact.html">Contact</a></li>
                            <li><a class="nav-link" href="utilities-invoice.html">Invoice</a></li>
                            <li><a href="utilities-subscribe.html">Subscribe</a></li>
                        </ul>
                    </li>
                    <li><a class="nav-link" href="credits.html"><i class="fas fa-pencil-ruler"></i> <span>Credits</span></a></li>
                </ul>
                <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
                    <a href="https://getcodiepie.com/docs" class="btn btn-primary btn-lg btn-block btn-icon-split"><i class="fas fa-rocket"></i> Documentation</a>
                </div>
            </aside>
    @elseif(Session::get('isAuthenticated')==true && Session::get('role')==3)
            <aside id="sidebar-wrapper">
                <div class="sidebar-brand">
                    <a href="#">SmartLearn</a>
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
                    <li class="menu-header">Starter</li>
                    <li class="dropdown">
                        <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Layout</span></a>
                        <ul class="dropdown-menu">
                            <li><a class="nav-link" href="layout-default.html">Default Layout</a></li>

                            <li><a class="nav-link" href="layout-top-navigation.html">Top Navigation</a></li>
                        </ul>
                    </li>
                    <li class=active><a class="nav-link" href="blank.html"><i class="far fa-square"></i> <span>Blank Page</span></a></li>
                    <li class="dropdown">
                        <a href="#" class="nav-link has-dropdown"><i class="fas fa-th"></i> <span>Bootstrap</span></a>
                        <ul class="dropdown-menu">
                            <li><a class="nav-link" href="bootstrap-alert.html">Alert</a></li>
                            <li><a class="nav-link" href="bootstrap-badge.html">Badge</a></li>
                            <li><a class="nav-link" href="bootstrap-breadcrumb.html">Breadcrumb</a></li>
                            <li><a class="nav-link" href="bootstrap-buttons.html">Buttons</a></li>
                            <li><a class="nav-link" href="bootstrap-card.html">Card</a></li>
                            <li><a class="nav-link" href="bootstrap-carousel.html">Carousel</a></li>
                            <li><a class="nav-link" href="bootstrap-collapse.html">Collapse</a></li>
                            <li><a class="nav-link" href="bootstrap-dropdown.html">Dropdown</a></li>
                            <li><a class="nav-link" href="bootstrap-form.html">Form</a></li>
                            <li><a class="nav-link" href="bootstrap-list-group.html">List Group</a></li>
                            <li><a class="nav-link" href="bootstrap-media-object.html">Media Object</a></li>
                            <li><a class="nav-link" href="bootstrap-modal.html">Modal</a></li>
                            <li><a class="nav-link" href="bootstrap-nav.html">Nav</a></li>
                            <li><a class="nav-link" href="bootstrap-navbar.html">Navbar</a></li>
                            <li><a class="nav-link" href="bootstrap-pagination.html">Pagination</a></li>
                            <li><a class="nav-link" href="bootstrap-popover.html">Popover</a></li>
                            <li><a class="nav-link" href="bootstrap-progress.html">Progress</a></li>
                            <li><a class="nav-link" href="bootstrap-table.html">Table</a></li>
                            <li><a class="nav-link" href="bootstrap-tooltip.html">Tooltip</a></li>
                            <li><a class="nav-link" href="bootstrap-typography.html">Typography</a></li>
                        </ul>
                    </li>
                    <li class="menu-header">CodiePie</li>
                    <li class="dropdown">
                        <a href="#" class="nav-link has-dropdown"><i class="fas fa-th-large"></i> <span>Components</span></a>
                        <ul class="dropdown-menu">
                            <li><a class="nav-link" href="components-article.html">Article</a></li>
                            <li><a class="nav-link beep beep-sidebar" href="components-avatar.html">Avatar</a></li>
                            <li><a class="nav-link" href="components-chat-box.html">Chat Box</a></li>
                            <li><a class="nav-link beep beep-sidebar" href="components-empty-state.html">Empty State</a></li>
                            <li><a class="nav-link" href="components-gallery.html">Gallery</a></li>
                            <li><a class="nav-link beep beep-sidebar" href="components-hero.html">Hero</a></li>
                            <li><a class="nav-link" href="components-multiple-upload.html">Multiple Upload</a></li>
                            <li><a class="nav-link beep beep-sidebar" href="components-pricing.html">Pricing</a></li>
                            <li><a class="nav-link" href="components-statistic.html">Statistic</a></li>
                            <li><a class="nav-link" href="components-tab.html">Tab</a></li>
                            <li><a class="nav-link" href="components-table.html">Table</a></li>
                            <li><a class="nav-link" href="components-user.html">User</a></li>
                            <li><a class="nav-link beep beep-sidebar" href="components-wizard.html">Wizard</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="nav-link has-dropdown"><i class="far fa-file-alt"></i> <span>Forms</span></a>
                        <ul class="dropdown-menu">
                            <li><a class="nav-link" href="forms-advanced-form.html">Advanced Form</a></li>
                            <li><a class="nav-link" href="forms-editor.html">Editor</a></li>
                            <li><a class="nav-link" href="forms-validation.html">Validation</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="nav-link has-dropdown"><i class="fas fa-map-marker-alt"></i> <span>Google Maps</span></a>
                        <ul class="dropdown-menu">
                            <li><a href="gmaps-advanced-route.html">Advanced Route</a></li>
                            <li><a href="gmaps-draggable-marker.html">Draggable Marker</a></li>
                            <li><a href="gmaps-geocoding.html">Geocoding</a></li>
                            <li><a href="gmaps-geolocation.html">Geolocation</a></li>
                            <li><a href="gmaps-marker.html">Marker</a></li>
                            <li><a href="gmaps-multiple-marker.html">Multiple Marker</a></li>
                            <li><a href="gmaps-route.html">Route</a></li>
                            <li><a href="gmaps-simple.html">Simple</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="nav-link has-dropdown"><i class="fas fa-plug"></i> <span>Modules</span></a>
                        <ul class="dropdown-menu">
                            <li class="menu-sub-header">Apps</li>
                            <li><a class="nav-link" href="modules-calendar.html">Calendar</a></li>

                            <li class="menu-sub-header">Charts</li>
                            <li><a class="nav-link" href="modules-chartjs.html">ChartJS</a></li>
                            <li><a class="nav-link" href="modules-apex-charts.html">Apex Charts</a></li>
                            <li><a class="nav-link" href="modules-e-charts.html">E Charts</a></li>
                            <li><a class="nav-link" href="modules-c3-charts.html">C3 Charts</a></li>
                            <li><a class="nav-link" href="modules-knob-charts.html">Knob Charts</a></li>
                            <li><a class="nav-link" href="modules-sparkline.html">Sparkline</a></li>
                            <li class="menu-sub-header">Tables</li>
                            <li><a class="nav-link" href="modules-datatables.html">DataTables</a></li>
                            <li><a class="nav-link" href="modules-table-more.html">More</a></li>
                            <li class="menu-sub-header">Font Icons</li>
                            <li><a class="nav-link" href="modules-font-awesome.html">Font Awesome</a></li>
                            <li><a class="nav-link" href="modules-line-icons.html">Line Icons</a></li>
                            <li><a class="nav-link" href="modules-feather-icons.html">Feather Icons</a></li>
                            <li><a class="nav-link" href="modules-ion-icons.html">Ion Icons</a></li>
                            <li><a class="nav-link" href="modules-flag.html">Flag</a></li>
                            <li><a class="nav-link" href="modules-weather-icon.html">Weather Icon</a></li>
                            <li class="menu-sub-header">Other</li>
                            <li><a class="nav-link" href="modules-owl-carousel.html">Owl Carousel</a></li>
                            <li><a class="nav-link" href="modules-sweet-alert.html">Sweet Alert</a></li>
                            <li><a class="nav-link" href="modules-toastr.html">Toastr</a></li>
                            <li><a class="nav-link" href="modules-vector-map.html">Vector Map</a></li>
                        </ul>
                    </li>
                    <li class="menu-header">Pages</li>
                    <li class="dropdown">
                        <a href="#" class="nav-link has-dropdown"><i class="far fa-user"></i> <span>Auth</span></a>
                        <ul class="dropdown-menu">
                            <li><a href="auth-forgot-password.html">Forgot Password</a></li> 
                            <li><a href="auth-login.html">Login</a></li> 
                            <li><a href="auth-register.html">Register</a></li> 
                            <li><a href="auth-reset-password.html">Reset Password</a></li> 
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="nav-link has-dropdown"><i class="fas fa-exclamation"></i> <span>Errors</span></a>
                        <ul class="dropdown-menu">
                            <li><a class="nav-link" href="errors-503.html">503</a></li> 
                            <li><a class="nav-link" href="errors-403.html">403</a></li> 
                            <li><a class="nav-link" href="errors-404.html">404</a></li> 
                            <li><a class="nav-link" href="errors-500.html">500</a></li> 
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="nav-link has-dropdown"><i class="fas fa-bicycle"></i> <span>Features</span></a>
                        <ul class="dropdown-menu">
                            <li><a class="nav-link" href="features-activities.html">Activities</a></li>
                            <li><a class="nav-link" href="features-post-create.html">Post Create</a></li>
                            <li><a class="nav-link" href="features-posts.html">Posts</a></li>
                            <li><a class="nav-link" href="features-profile.html">Profile</a></li>
                            <li><a class="nav-link" href="features-settings.html">Settings</a></li>
                            <li><a class="nav-link" href="features-setting-detail.html">Setting Detail</a></li>
                            <li><a class="nav-link" href="features-tickets.html">Tickets</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="nav-link has-dropdown"><i class="fas fa-ellipsis-h"></i> <span>Utilities</span></a>
                        <ul class="dropdown-menu">
                            <li><a href="utilities-contact.html">Contact</a></li>
                            <li><a class="nav-link" href="utilities-invoice.html">Invoice</a></li>
                            <li><a href="utilities-subscribe.html">Subscribe</a></li>
                        </ul>
                    </li>
                    <li><a class="nav-link" href="credits.html"><i class="fas fa-pencil-ruler"></i> <span>Credits</span></a></li>
                </ul>
                <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
                    <a href="https://getcodiepie.com/docs" class="btn btn-primary btn-lg btn-block btn-icon-split"><i class="fas fa-rocket"></i> Documentation</a>
                </div>
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
                                <li><a class="nav-link" href="bootstrap-alert.html">Add New School</a></li>
                                <li><a class="nav-link" href="bootstrap-alert.html">School List</a></li>
                            </ul>
                        </li>
                        
                        <li class="dropdown">
                            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-book"></i> <span>Majors | Course Of Study</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="layout-default.html">Upload Major</a></li>
                                
                                <li><a class="nav-link" href="layout-top-navigation.html">Major List</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a class="nav-link has-dropwdown" href="blank.html"><i class="fas fa-building-user"></i> <span>Courses</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="layout-default.html">Upload Course</a></li>
                                
                                <li><a class="nav-link" href="layout-top-navigation.html">Course List</a></li>
                            </ul>
                        </li>
                        
                        <li class="menu-header">User Management</li>
                        <li class="dropdown">
                            <a href="#" class="nav-link has-dropdown"><i class="fas fa-chalkboard-user"></i> <span>Lecturers</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link beep beep-sidebar" href="components-avatar.html">Pending Lecturers</a></li>
                                <li><a class="nav-link" href="components-article.html">Approvals</a></li>

                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="nav-link has-dropdown"><i class="far fa-user"></i> <span>Students</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="forms-advanced-form.html">Advanced Form</a></li>
                                <li><a class="nav-link" href="forms-editor.html">Editor</a></li>
                                <li><a class="nav-link" href="forms-validation.html">Validation</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="nav-link has-dropdown"><i class="fas fa-map-marker-alt"></i> <span>Google Maps</span></a>
                            <ul class="dropdown-menu">
                                <li><a href="gmaps-advanced-route.html">Advanced Route</a></li>
                                <li><a href="gmaps-draggable-marker.html">Draggable Marker</a></li>
                                <li><a href="gmaps-geocoding.html">Geocoding</a></li>
                                <li><a href="gmaps-geolocation.html">Geolocation</a></li>
                                <li><a href="gmaps-marker.html">Marker</a></li>
                                <li><a href="gmaps-multiple-marker.html">Multiple Marker</a></li>
                                <li><a href="gmaps-route.html">Route</a></li>
                                <li><a href="gmaps-simple.html">Simple</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="nav-link has-dropdown"><i class="fas fa-plug"></i> <span>Modules</span></a>
                            <ul class="dropdown-menu">
                                <li class="menu-sub-header">Apps</li>
                                <li><a class="nav-link" href="modules-calendar.html">Calendar</a></li>
                                
                                <li class="menu-sub-header">Charts</li>
                                <li><a class="nav-link" href="modules-chartjs.html">ChartJS</a></li>
                                <li><a class="nav-link" href="modules-apex-charts.html">Apex Charts</a></li>
                                <li><a class="nav-link" href="modules-e-charts.html">E Charts</a></li>
                                <li><a class="nav-link" href="modules-c3-charts.html">C3 Charts</a></li>
                                <li><a class="nav-link" href="modules-knob-charts.html">Knob Charts</a></li>
                                <li><a class="nav-link" href="modules-sparkline.html">Sparkline</a></li>
                                <li class="menu-sub-header">Tables</li>
                                <li><a class="nav-link" href="modules-datatables.html">DataTables</a></li>
                                <li><a class="nav-link" href="modules-table-more.html">More</a></li>
                                <li class="menu-sub-header">Font Icons</li>
                                <li><a class="nav-link" href="modules-font-awesome.html">Font Awesome</a></li>
                                <li><a class="nav-link" href="modules-line-icons.html">Line Icons</a></li>
                                <li><a class="nav-link" href="modules-feather-icons.html">Feather Icons</a></li>
                                <li><a class="nav-link" href="modules-ion-icons.html">Ion Icons</a></li>
                                <li><a class="nav-link" href="modules-flag.html">Flag</a></li>
                                <li><a class="nav-link" href="modules-weather-icon.html">Weather Icon</a></li>
                                <li class="menu-sub-header">Other</li>
                                <li><a class="nav-link" href="modules-owl-carousel.html">Owl Carousel</a></li>
                                <li><a class="nav-link" href="modules-sweet-alert.html">Sweet Alert</a></li>
                                <li><a class="nav-link" href="modules-toastr.html">Toastr</a></li>
                                <li><a class="nav-link" href="modules-vector-map.html">Vector Map</a></li>
                            </ul>
                        </li>
                        <li class="menu-header">Pages</li>
                        <li class="dropdown">
                            <a href="#" class="nav-link has-dropdown"><i class="far fa-user"></i> <span>Auth</span></a>
                            <ul class="dropdown-menu">
                                <li><a href="auth-forgot-password.html">Forgot Password</a></li> 
                                <li><a href="auth-login.html">Login</a></li> 
                                <li><a href="auth-register.html">Register</a></li> 
                                <li><a href="auth-reset-password.html">Reset Password</a></li> 
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="nav-link has-dropdown"><i class="fas fa-exclamation"></i> <span>Errors</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="errors-503.html">503</a></li> 
                                <li><a class="nav-link" href="errors-403.html">403</a></li> 
                                <li><a class="nav-link" href="errors-404.html">404</a></li> 
                                <li><a class="nav-link" href="errors-500.html">500</a></li> 
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="nav-link has-dropdown"><i class="fas fa-bicycle"></i> <span>Features</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="features-activities.html">Activities</a></li>
                                <li><a class="nav-link" href="features-post-create.html">Post Create</a></li>
                                <li><a class="nav-link" href="features-posts.html">Posts</a></li>
                                <li><a class="nav-link" href="features-profile.html">Profile</a></li>
                                <li><a class="nav-link" href="features-settings.html">Settings</a></li>
                                <li><a class="nav-link" href="features-setting-detail.html">Setting Detail</a></li>
                                <li><a class="nav-link" href="features-tickets.html">Tickets</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="nav-link has-dropdown"><i class="fas fa-ellipsis-h"></i> <span>Utilities</span></a>
                            <ul class="dropdown-menu">
                                <li><a href="utilities-contact.html">Contact</a></li>
                                <li><a class="nav-link" href="utilities-invoice.html">Invoice</a></li>
                                <li><a href="utilities-subscribe.html">Subscribe</a></li>
                            </ul>
                        </li>
                        <li><a class="nav-link" href="credits.html"><i class="fas fa-pencil-ruler"></i> <span>Credits</span></a></li>
                    </ul>
                    <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
                        <a href="https://getcodiepie.com/docs" class="btn btn-primary btn-lg btn-block btn-icon-split"><i class="fas fa-rocket"></i> Documentation</a>
                    </div>
            </aside>
    @else
            <aside id="sidebar-wrapper">
                <div class="sidebar-brand">
                    <a href="#">SmartLearn</a>
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
                    <li class="menu-header">Starter</li>
                    <li class="dropdown">
                        <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Layout</span></a>
                        <ul class="dropdown-menu">
                            <li><a class="nav-link" href="layout-default.html">Default Layout</a></li>

                            <li><a class="nav-link" href="layout-top-navigation.html">Top Navigation</a></li>
                        </ul>
                    </li>
                    <li class=active><a class="nav-link" href="blank.html"><i class="far fa-square"></i> <span>Blank Page</span></a></li>
                    <li class="dropdown">
                        <a href="#" class="nav-link has-dropdown"><i class="fas fa-th"></i> <span>Bootstrap</span></a>
                        <ul class="dropdown-menu">
                            <li><a class="nav-link" href="bootstrap-alert.html">Alert</a></li>
                            <li><a class="nav-link" href="bootstrap-badge.html">Badge</a></li>
                            <li><a class="nav-link" href="bootstrap-breadcrumb.html">Breadcrumb</a></li>
                            <li><a class="nav-link" href="bootstrap-buttons.html">Buttons</a></li>
                            <li><a class="nav-link" href="bootstrap-card.html">Card</a></li>
                            <li><a class="nav-link" href="bootstrap-carousel.html">Carousel</a></li>
                            <li><a class="nav-link" href="bootstrap-collapse.html">Collapse</a></li>
                            <li><a class="nav-link" href="bootstrap-dropdown.html">Dropdown</a></li>
                            <li><a class="nav-link" href="bootstrap-form.html">Form</a></li>
                            <li><a class="nav-link" href="bootstrap-list-group.html">List Group</a></li>
                            <li><a class="nav-link" href="bootstrap-media-object.html">Media Object</a></li>
                            <li><a class="nav-link" href="bootstrap-modal.html">Modal</a></li>
                            <li><a class="nav-link" href="bootstrap-nav.html">Nav</a></li>
                            <li><a class="nav-link" href="bootstrap-navbar.html">Navbar</a></li>
                            <li><a class="nav-link" href="bootstrap-pagination.html">Pagination</a></li>
                            <li><a class="nav-link" href="bootstrap-popover.html">Popover</a></li>
                            <li><a class="nav-link" href="bootstrap-progress.html">Progress</a></li>
                            <li><a class="nav-link" href="bootstrap-table.html">Table</a></li>
                            <li><a class="nav-link" href="bootstrap-tooltip.html">Tooltip</a></li>
                            <li><a class="nav-link" href="bootstrap-typography.html">Typography</a></li>
                        </ul>
                    </li>
                    <li class="menu-header">CodiePie</li>
                    <li class="dropdown">
                        <a href="#" class="nav-link has-dropdown"><i class="fas fa-th-large"></i> <span>Components</span></a>
                        <ul class="dropdown-menu">
                            <li><a class="nav-link" href="components-article.html">Article</a></li>
                            <li><a class="nav-link beep beep-sidebar" href="components-avatar.html">Avatar</a></li>
                            <li><a class="nav-link" href="components-chat-box.html">Chat Box</a></li>
                            <li><a class="nav-link beep beep-sidebar" href="components-empty-state.html">Empty State</a></li>
                            <li><a class="nav-link" href="components-gallery.html">Gallery</a></li>
                            <li><a class="nav-link beep beep-sidebar" href="components-hero.html">Hero</a></li>
                            <li><a class="nav-link" href="components-multiple-upload.html">Multiple Upload</a></li>
                            <li><a class="nav-link beep beep-sidebar" href="components-pricing.html">Pricing</a></li>
                            <li><a class="nav-link" href="components-statistic.html">Statistic</a></li>
                            <li><a class="nav-link" href="components-tab.html">Tab</a></li>
                            <li><a class="nav-link" href="components-table.html">Table</a></li>
                            <li><a class="nav-link" href="components-user.html">User</a></li>
                            <li><a class="nav-link beep beep-sidebar" href="components-wizard.html">Wizard</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="nav-link has-dropdown"><i class="far fa-file-alt"></i> <span>Forms</span></a>
                        <ul class="dropdown-menu">
                            <li><a class="nav-link" href="forms-advanced-form.html">Advanced Form</a></li>
                            <li><a class="nav-link" href="forms-editor.html">Editor</a></li>
                            <li><a class="nav-link" href="forms-validation.html">Validation</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="nav-link has-dropdown"><i class="fas fa-map-marker-alt"></i> <span>Google Maps</span></a>
                        <ul class="dropdown-menu">
                            <li><a href="gmaps-advanced-route.html">Advanced Route</a></li>
                            <li><a href="gmaps-draggable-marker.html">Draggable Marker</a></li>
                            <li><a href="gmaps-geocoding.html">Geocoding</a></li>
                            <li><a href="gmaps-geolocation.html">Geolocation</a></li>
                            <li><a href="gmaps-marker.html">Marker</a></li>
                            <li><a href="gmaps-multiple-marker.html">Multiple Marker</a></li>
                            <li><a href="gmaps-route.html">Route</a></li>
                            <li><a href="gmaps-simple.html">Simple</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="nav-link has-dropdown"><i class="fas fa-plug"></i> <span>Modules</span></a>
                        <ul class="dropdown-menu">
                            <li class="menu-sub-header">Apps</li>
                            <li><a class="nav-link" href="modules-calendar.html">Calendar</a></li>

                            <li class="menu-sub-header">Charts</li>
                            <li><a class="nav-link" href="modules-chartjs.html">ChartJS</a></li>
                            <li><a class="nav-link" href="modules-apex-charts.html">Apex Charts</a></li>
                            <li><a class="nav-link" href="modules-e-charts.html">E Charts</a></li>
                            <li><a class="nav-link" href="modules-c3-charts.html">C3 Charts</a></li>
                            <li><a class="nav-link" href="modules-knob-charts.html">Knob Charts</a></li>
                            <li><a class="nav-link" href="modules-sparkline.html">Sparkline</a></li>
                            <li class="menu-sub-header">Tables</li>
                            <li><a class="nav-link" href="modules-datatables.html">DataTables</a></li>
                            <li><a class="nav-link" href="modules-table-more.html">More</a></li>
                            <li class="menu-sub-header">Font Icons</li>
                            <li><a class="nav-link" href="modules-font-awesome.html">Font Awesome</a></li>
                            <li><a class="nav-link" href="modules-line-icons.html">Line Icons</a></li>
                            <li><a class="nav-link" href="modules-feather-icons.html">Feather Icons</a></li>
                            <li><a class="nav-link" href="modules-ion-icons.html">Ion Icons</a></li>
                            <li><a class="nav-link" href="modules-flag.html">Flag</a></li>
                            <li><a class="nav-link" href="modules-weather-icon.html">Weather Icon</a></li>
                            <li class="menu-sub-header">Other</li>
                            <li><a class="nav-link" href="modules-owl-carousel.html">Owl Carousel</a></li>
                            <li><a class="nav-link" href="modules-sweet-alert.html">Sweet Alert</a></li>
                            <li><a class="nav-link" href="modules-toastr.html">Toastr</a></li>
                            <li><a class="nav-link" href="modules-vector-map.html">Vector Map</a></li>
                        </ul>
                    </li>
                    <li class="menu-header">Pages</li>
                    <li class="dropdown">
                        <a href="#" class="nav-link has-dropdown"><i class="far fa-user"></i> <span>Auth</span></a>
                        <ul class="dropdown-menu">
                            <li><a href="auth-forgot-password.html">Forgot Password</a></li> 
                            <li><a href="auth-login.html">Login</a></li> 
                            <li><a href="auth-register.html">Register</a></li> 
                            <li><a href="auth-reset-password.html">Reset Password</a></li> 
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="nav-link has-dropdown"><i class="fas fa-exclamation"></i> <span>Errors</span></a>
                        <ul class="dropdown-menu">
                            <li><a class="nav-link" href="errors-503.html">503</a></li> 
                            <li><a class="nav-link" href="errors-403.html">403</a></li> 
                            <li><a class="nav-link" href="errors-404.html">404</a></li> 
                            <li><a class="nav-link" href="errors-500.html">500</a></li> 
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="nav-link has-dropdown"><i class="fas fa-bicycle"></i> <span>Features</span></a>
                        <ul class="dropdown-menu">
                            <li><a class="nav-link" href="features-activities.html">Activities</a></li>
                            <li><a class="nav-link" href="features-post-create.html">Post Create</a></li>
                            <li><a class="nav-link" href="features-posts.html">Posts</a></li>
                            <li><a class="nav-link" href="features-profile.html">Profile</a></li>
                            <li><a class="nav-link" href="features-settings.html">Settings</a></li>
                            <li><a class="nav-link" href="features-setting-detail.html">Setting Detail</a></li>
                            <li><a class="nav-link" href="features-tickets.html">Tickets</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="nav-link has-dropdown"><i class="fas fa-ellipsis-h"></i> <span>Utilities</span></a>
                        <ul class="dropdown-menu">
                            <li><a href="utilities-contact.html">Contact</a></li>
                            <li><a class="nav-link" href="utilities-invoice.html">Invoice</a></li>
                            <li><a href="utilities-subscribe.html">Subscribe</a></li>
                        </ul>
                    </li>
                    <li><a class="nav-link" href="credits.html"><i class="fas fa-pencil-ruler"></i> <span>Credits</span></a></li>
                </ul>
                <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
                    <a href="https://getcodiepie.com/docs" class="btn btn-primary btn-lg btn-block btn-icon-split"><i class="fas fa-rocket"></i> Documentation</a>
                </div>
            </aside>
    @endif
</div>