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
								<a class="dropdown-item" href="{{ route('comingsoon') }}">Courses</a>
							</li>

							<!-- Dropdown submenu -->
							<li class="dropdown-submenu dropend">
								<a class="dropdown-item dropdown-toggle" href="#">About</a>
								<ul class="dropdown-menu dropdown-menu-start" data-bs-popper="none">
									<li> <a class="dropdown-item" href="{{ route('comingsoon') }}">About Us</a></li>
									<li> <a class="dropdown-item" href="{{ route('comingsoon') }}">Contact Us</a></li>
								</ul>
							</li>
							<li> <a class="dropdown-item" href="{{ route('comingsoon') }}">Instructor List</a></li>
							<li> <a class="dropdown-item" href="{{ route('comingsoon') }}">FAQs</a></li>
						</ul>
					</li>

					<!-- Nav item  Get Started -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="pagesMenu" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Get Started</a>
                        <ul class="dropdown-menu" aria-labelledby="pagesMenu">
                            <!-- Dropdown submenu -->
                            <li> <a class="dropdown-item" href="{{ route('login') }}">Login</a></li>
                            

                            <!-- Dropdown submenu -->
                            <li class="dropdown-submenu dropend">
                                <a class="dropdown-item dropdown-toggle" href="#">Sign Up</a>
                                <ul class="dropdown-menu dropdown-menu-start" data-bs-popper="none">
                                    <li> <a class="dropdown-item" href="{{ route('studentssignup') }}">Sign Up For Students</a></li>
									<li> <a class="dropdown-item" href="{{ route('lecturersignup') }}">Sign Up For Lecturers </a></li>
                                </ul>
                            </li>
                            <li> <a class="dropdown-item" href="{{ route('comingsoon') }}">FAQs</a></li>
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
							<a href="{{ route('comingsoon') }}" class="text-body"> <i class="far fa-clock me-1"></i>Digital marketing course for Beginner</a>
						</li>
						<li class="list-group-item text-primary-hover text-truncate">
							<a href="{{ route('comingsoon') }}" class="text-body"> <i class="far fa-clock me-1"></i>Customer Life cycle</a>
						</li>
					</ul>
				</div>
			</div>
			<!-- Nav Search END -->

		</div>
	</nav>
	<!-- Logo Nav END -->
</header>