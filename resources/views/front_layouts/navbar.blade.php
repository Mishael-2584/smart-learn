<header class="navbar-light header-static navbar-sticky">
	<!-- Logo Nav START -->
	<nav class="navbar navbar-expand-xl">
		<div class="container">
			<!-- Logo START -->
			<a class="navbar-brand me-0" href="{{ route('front') }}">
				<img class="light-mode-item navbar-brand-item" src="{{ asset('codiepie/assets/img/smartlearn-logo/svg/logonew.svg') }}" alt="logo">
				{{-- <img class="dark-mode-item navbar-brand-item" src="{{ asset('eduport/assets/images/logo-light.svg') }}" alt="logo"> --}}
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

				<ul class="navbar-nav navbar-nav-scroll mx-auto">
					<!-- Nav item 1 HOME -->
					<li class="nav-link"><a class="nav-link-active" href="{{ route('front') }}">HOME</a></li>
					<li class="nav-link"><a class="nav-link" href="{{ route('front') }}">Contact</a></li>
					<li class="nav-link"><a class="nav-link" href="{{ route('front') }}">FAQs</a></li>
					

					<!-- Nav item 2 Pages -->
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="pagesMenu" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">About</a>
						<ul class="dropdown-menu" aria-labelledby="pagesMenu">
							<!-- Dropdown submenu -->
							<li class="dropdown-submenu dropend">
								<a class="dropdown-item dropdown-toggle" href="#">About Us</a>
								<ul class="dropdown-menu dropdown-menu-start" data-bs-popper="none">
									<li> <a class="dropdown-item" href="course-grid.html">Privacy Policy</a></li>
									<li> <a class="dropdown-item" href="course-grid-2.html">Courses</a></li>
									
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
						</ul>
					</li>


					
				</ul>
			</div>
			<!-- Main navbar END -->

		</div>
	</nav>
	<!-- Logo Nav END -->
</header>