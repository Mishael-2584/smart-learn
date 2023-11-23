<header class="navbar-light header-static navbar-sticky">
	<!-- Logo Nav START -->
	<nav class="navbar navbar-expand-xl">
		<div class="container">
			<!-- Logo START -->
			<a class="navbar-brand me-0" href="{{ route('front') }}">
				<img class="light-mode-item navbar-brand-item" src="{{ asset("codiepie/assets/img/smartlearn-logo/svg/logonew.svg") }}" alt="logo">
				{{-- <img class="dark-mode-item navbar-brand-item" src="{{ asset("eduport/assets/images/logo-light.svg") }}" alt="logo"> --}}
			</a>
			<!-- Logo END -->

			<!-- Responsive navbar toggler -->
      <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-animation">
					<span></span>
					<span></span>
					<span></span>
				</span>
			</button>

			<!-- Main navbar START -->
			<div class="navbar-collapse collapse" id="navbarCollapse">

				<!-- Nav Search END -->
				<ul class="navbar-nav navbar-nav-scroll mx-auto">
					<!-- Nav item 1 HOME -->
					<li class="nav-link"><a class="nav-link-active" href="{{ route('front') }}">HOME</a></li>
					

					<!-- Nav item 2 Pages -->
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="pagesMenu" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pages</a>
						<ul class="dropdown-menu" aria-labelledby="pagesMenu">
							<!-- Dropdown submenu -->
							<li class="dropdown-submenu dropend">
								<a class="dropdown-item dropdown-toggle" href="#">Course</a>
								<ul class="dropdown-menu dropdown-menu-start" data-bs-popper="none">
									<li> <a class="dropdown-item" href="course-grid.html">Course Grid Classic</a></li>
									<li> <a class="dropdown-item" href="course-grid-2.html">Course Grid Minimal</a></li>
									
								</ul>
							</li>

							<!-- Dropdown submenu -->
							<li class="dropdown-submenu dropend">
								<a class="dropdown-item dropdown-toggle" href="#">About</a>
								<ul class="dropdown-menu dropdown-menu-start" data-bs-popper="none">
									<li> <a class="dropdown-item" href="about.html">About Us</a></li>
									<li> <a class="dropdown-item" href="contact-us.html">Contact Us</a></li>
								</ul>
							</li>
							<li> <a class="dropdown-item" href="instructor-list.html">Instructor List</a></li>
							<li> <a class="dropdown-item" href="instructor-single.html">Instructor Single</a></li>
							<li> <a class="dropdown-item" href="faq.html">FAQs</a></li>
							<li> <a class="dropdown-item" href="error-404.html">Error 404</a></li>
							<li> <a class="dropdown-item" href="coming-soon.html">Coming Soon</a></li>
						</ul>
					</li>

					<!-- Nav item 3 Account -->
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="accounntMenu" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Accounts</a>
						<ul class="dropdown-menu" aria-labelledby="accounntMenu">
							<!-- Dropdown submenu -->
							<li class="dropdown-submenu dropend">
								<a class="dropdown-item dropdown-toggle" href="#"><i class="fas fa-user-tie fa-fw me-1"></i>Instructor</a>
								<ul class="dropdown-menu dropdown-menu-start" data-bs-popper="none">
									<li> <a class="dropdown-item" href="instructor-dashboard.html"><i class="bi bi-grid-fill fa-fw me-1"></i>Dashboard</a> </li>
									<li> <a class="dropdown-item" href="instructor-manage-course.html"><i class="bi bi-basket-fill fa-fw me-1"></i>Courses</a> </li>
									<li> <a class="dropdown-item" href="instructor-create-course.html"><i class="bi bi-file-earmark-plus-fill fa-fw me-1"></i>Create Course</a> </li>
									<li> <a class="dropdown-item" href="course-added.html"><i class="bi bi-file-check-fill fa-fw me-1"></i>Course Added</a> </li>
									<li> <a class="dropdown-item" href="instructor-earning.html"><i class="fas fa-chart-line fa-fw me-1"></i>Earnings</a> </li>
									<li> <a class="dropdown-item" href="instructor-studentlist.html"><i class="fas fa-user-graduate fa-fw me-1"></i>Students</a> </li>
									<li> <a class="dropdown-item" href="instructor-order.html"><i class="bi bi-cart-check-fill fa-fw me-1"></i>Orders</a> </li>
									<li> <a class="dropdown-item" href="instructor-review.html"><i class="bi bi-star-fill fa-fw me-1"></i>Reviews</a> </li>
									<li> <a class="dropdown-item" href="instructor-payout.html"><i class="fas fa-wallet fa-fw me-1"></i>Payout</a> </li>
								</ul>
							</li>

							<!-- Dropdown submenu -->
								<li class="dropdown-submenu dropend">
								<a class="dropdown-item dropdown-toggle" href="#"><i class="fas fa-user-graduate fa-fw me-1"></i>Student</a>
								<ul class="dropdown-menu dropdown-menu-start" data-bs-popper="none">
									<li> <a class="dropdown-item" href="student-dashboard.html"><i class="bi bi-grid-fill fa-fw me-1"></i>Dashboard</a> </li>
									<li> <a class="dropdown-item" href="student-subscription.html"><i class="bi bi-card-checklist fa-fw me-1"></i>My Subscriptions</a> </li>
									<li> <a class="dropdown-item" href="student-course-list.html"><i class="bi bi-basket-fill fa-fw me-1"></i>Courses</a> </li>
									<li> <a class="dropdown-item" href="student-payment-info.html"><i class="bi bi-credit-card-2-front-fill fa-fw me-1"></i>Payment Info</a> </li>
									<li> <a class="dropdown-item" href="student-bookmark.html"><i class="fas bi-cart-check-fill fa-fw me-1"></i>Wishlist</a> </li>
								</ul>
							</li>
							
							<li> <a class="dropdown-item" href="#"><i class="fas fa-user-cog fa-fw me-1"></i>Admin (Coming Soon)</a> </li>
							<li> <hr class="dropdown-divider"></li>
							<li> <a class="dropdown-item" href="instructor-edit-profile.html"><i class="fas fa-fw fa-edit me-1"></i>Edit Profile</a> </li>
							<li> <a class="dropdown-item" href="instructor-setting.html"><i class="fas fa-fw fa-cog me-1"></i>Settings</a> </li>
							<li> <a class="dropdown-item" href="instructor-delete-account.html"><i class="fas fa-fw fa-trash-alt me-1"></i>Delete Profile</a> </li>
						</ul>
					</li>

					<!-- Nav item  Get Started -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="pagesMenu" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Get Started</a>
                        <ul class="dropdown-menu" aria-labelledby="pagesMenu">
                            <!-- Dropdown submenu -->
                            <li> <a class="dropdown-item" href="{{ route('login') }}">Login</a></li>
                            <li> <a class="dropdown-item" href="{{ route('lecturersignup') }}">Sign Up For Lecturers </a></li>

                            <!-- Dropdown submenu -->
                            <li class="dropdown-submenu dropend">
                                <a class="dropdown-item dropdown-toggle" href="#">Authentication</a>
                                <ul class="dropdown-menu dropdown-menu-start" data-bs-popper="none">
                                    <li> <a class="dropdown-item" href="{{ route('studentssignup') }}">Sign Up</a></li>
                                    <li> <a class="dropdown-item" href="forgot-password.html">Forgot Password</a></li>
                                </ul>
                            </li>

                            <li> <a class="dropdown-item" href="faq.html">FAQs</a></li>
                            <li> <a class="dropdown-item" href="error-404.html">Error 404</a></li>
                            <li> <a class="dropdown-item" href="coming-soon.html">Coming Soon</a></li>
                        </ul>
                    </li>
					
				</ul>
			</div>
			<!-- Main navbar END -->

			<!-- Nav Search START -->
			<div class="nav-item dropdown nav-search px-1 px-lg-3">
				<a class="nav-link" role="button" href="#" id="navSearch" data-bs-toggle="dropdown" aria-expanded="true" data-bs-auto-close="outside" data-bs-display="static">
					<i class="bi bi-search fs-4"> </i>
				</a>
				<div class="dropdown-menu dropdown-menu-end shadow rounded p-2" aria-labelledby="navSearch" data-bs-popper="none">
					<form class="input-group">
						<input class="form-control border-primary" type="search" placeholder="Search..." aria-label="Search">
						<button class="btn btn-primary m-0" type="submit">Search</button>
					</form>

					<!-- Recent search -->
					<ul class="list-group list-group-borderless p-2 small">
						<li class="list-group-item d-flex justify-content-between align-items-center">
							<span class="fw-bold">Recent Searches:</span>
							<button class="btn btn-sm btn-link mb-0 px-0">Clear all</button>
						</li>
						<li class="list-group-item text-primary-hover text-truncate">
							<a href="#" class="text-body"> <i class="far fa-clock me-1"></i>Digital marketing course for Beginner</a>
						</li>
						<li class="list-group-item text-primary-hover text-truncate">
							<a href="#" class="text-body"> <i class="far fa-clock me-1"></i>Customer Life cycle</a>
						</li>
						<li class="list-group-item text-primary-hover text-truncate">
							<a href="#" class="text-body"> <i class="far fa-clock me-1"></i>What is Search</a>
						</li>
						<li class="list-group-item text-primary-hover text-truncate">
							<a href="#" class="text-body"> <i class="far fa-clock me-1"></i>Facebook ADS</a>
						</li>
					</ul>
				</div>
			</div>
			<!-- Nav Search END -->

      <!-- Profile START -->
			<div class="dropdown ms-1 ms-lg-0">
				<a class="avatar avatar-sm p-0" href="#" id="profileDropdown" role="button" data-bs-auto-close="outside" data-bs-display="static" data-bs-toggle="dropdown" aria-expanded="false">
					<img class="avatar-img rounded-circle" src="{{ asset("eduport/assets/images/avatar/01.jpg") }}" alt="avatar">
				</a>
				<ul class="dropdown-menu dropdown-animation dropdown-menu-end shadow pt-3" aria-labelledby="profileDropdown">
					<!-- Profile info -->
					<li class="px-3">
						<div class="d-flex align-items-center">
							<!-- Avatar -->
							<div class="avatar me-3">
								<img class="avatar-img rounded-circle shadow" src="{{ asset("eduport/assets/images/avatar/01.jpg") }}" alt="avatar">
							</div>
							<div>
								<a class="h6" href="#">Lori Ferguson</a>
								<p class="small m-0">example@gmail.com</p>
							</div>
						</div>
						<hr>
					</li>
					<!-- Links -->
					<li><a class="dropdown-item" href="#"><i class="bi bi-person fa-fw me-2"></i>Edit Profile</a></li>
					<li><a class="dropdown-item" href="#"><i class="bi bi-gear fa-fw me-2"></i>Account Settings</a></li>
					<li><a class="dropdown-item" href="#"><i class="bi bi-info-circle fa-fw me-2"></i>Help</a></li>
					<li><a class="dropdown-item bg-danger-soft-hover" href="#"><i class="bi bi-power fa-fw me-2"></i>Sign Out</a></li>
					<li> <hr class="dropdown-divider"></li>
					<!-- Dark mode switch START -->
					<li>
						<div class="modeswitch-wrap" id="darkModeSwitch">
							<div class="modeswitch-item">
								<div class="modeswitch-icon"></div>
							</div>
							<span>Dark mode</span>
						</div>
					</li> 
          <!-- Dark mode switch END -->
				</ul>
			</div>
			<!-- Profile START -->
		</div>
	</nav>
	<!-- Logo Nav END -->
</header>