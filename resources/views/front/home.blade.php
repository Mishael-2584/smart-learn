@extends('front_layouts.app')

@section('content')
    
<!-- =======================
Main Banner START -->
<section class="pt-0 position-relative overflow-hidden h-700px h-sm-600px h-lg-700px rounded-top-4 mx-2 mx-md-4" style="background-image:url({{ asset('eduport/assets/images/bg/05.jpg') }}); background-position: center; background-size: cover;">
	<div class="bg-overlay bg-dark opacity-5"></div>
	<!-- SVG decoration for curve -->
	<figure class="position-absolute bottom-0 left-0 w-100 d-md-block mb-n3 z-index-9">
		<svg class="fill-body" width="100%" height="150" viewbox="0 0 500 150" preserveaspectratio="none">
			<path d="M0,150 L0,40 Q250,150 500,40 L580,150 Z"></path>
		</svg>
	</figure>
	<!-- SVG decoration -->
	<figure class="position-absolute top-0 start-50 translate-middle-x z-index-9 mt-5">
		<svg width="29px" height="29px">
			<path class="fill-orange" d="M29.004,14.502 C29.004,22.512 22.511,29.004 14.502,29.004 C6.492,29.004 -0.001,22.512 -0.001,14.502 C-0.001,6.492 6.492,-0.001 14.502,-0.001 C22.511,-0.001 29.004,6.492 29.004,14.502 Z"></path>
		</svg>
	</figure>
		
	<div class="container z-index-9 position-relative">
		<!-- SVG decoration -->
		<figure class="position-absolute bottom-0 end-0 z-index-9 ms-5 mb-5">
			<svg width="23px" height="23px">
			<path class="fill-purple" d="M23.003,11.501 C23.003,17.854 17.853,23.003 11.501,23.003 C5.149,23.003 -0.001,17.854 -0.001,11.501 C-0.001,5.149 5.149,-0.000 11.501,-0.000 C17.853,-0.000 23.003,5.149 23.003,11.501 Z"></path>
			</svg>
		</figure>

		<div class="row py-0 py-md-5 align-items-center text-center text-sm-start">
			<div class="col-sm-10 col-lg-8 col-xl-6 all-text-white my-5 mt-md-0">
				<div class="py-0 py-md-5 my-5">
					
					<!-- Badge with content -->
					<div class="d-inline-block bg-white px-3 py-2 rounded-pill mb-3">
						<p class="mb-0 text-dark"><span class="badge bg-success rounded-pill me-1">New</span> Interactive video calls with the best supporting tools for learning </p>
					</div>
					
					<!-- Title -->
					<h1 class="text-white display-5">Empower Your Online <span class="text-warning">Learning Experience</span></h1>
					<p class="text-white"> Smart-Learn is your key to a smarter and more efficient learning ecosystem.</p>
					
					<div class="d-sm-flex align-items-center mt-4">
						<!-- Button -->
						<a href="{{ route('studentssignup') }}" class="btn btn-purple me-2 mb-4 mb-sm-0">Get Started</a>
						<!-- Video button -->
						<a data-glightbox="" data-gallery="office-tour" href="https://www.youtube.com/embed/tXHviS-4ygo" class="d-block ms-0 ms-sm-4">
							<div class="btn btn-round btn-white-shadow text-danger mb-0 me-3 align-middle d-inline-block"> <i class="fas fa-play"></i></div>
							<span class="mb-0 text-white">Watch video</span>
            </a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- =======================
Main Banner END -->

<!-- =======================



About START -->
<section>
	<div class="container">
		<div class="row g-4 align-items-center">
			<div class="col-lg-5">
				<!-- Title -->
				<h2>Find Out More About us, <span class="text-warning">SMARTLEARN</span> insides.</h2>
				<!-- Image -->
				<img src="{{ asset('eduport/assets/images/about/03.jpg') }}" class="rounded-2" alt="">
			</div>
			<div class="col-lg-7">
				<div class="row g-4">
					<!-- Item -->
					<div class="col-sm-6">
						<div class="icon-lg bg-orange bg-opacity-10 text-orange rounded-2"><i class="fas fa-user-tie fs-5"></i></div>
						<h5 class="mt-2">Learn with Experts</h5>
						<p class="mb-0">Elevate your learning with industry experts from diferent parts of the world that will guide you through courses designed for real-world success</p>
					</div>
					<!-- Item -->
					<div class="col-sm-6">
						<div class="icon-lg bg-info bg-opacity-10 text-info rounded-2"><i class="fas fa-book fs-5"></i></div>
						<h5 class="mt-2">Explore Diverse Subjects</h5>
						<p class="mb-0">Dive into a world of knowledge with our diverse courses spanning technology, arts, business, and sciences</p>
					</div>
					<!-- Item -->
					<div class="col-sm-6">
						<div class="icon-lg bg-success bg-opacity-10 text-success rounded-2"><i class="bi bi-alarm-fill fs-5"></i></div>
						<h5 class="mt-2">Flexible Learning</h5>
						<p class="mb-0">Learn on your terms – anytime, anywhere. Our platform adapts to your schedule for seamless, flexible learning</p>
					</div>
					<!-- Item -->
					<div class="col-sm-6">
						<div class="icon-lg bg-purple bg-opacity-10 text-purple rounded-2"><i class="fas fa-university fs-5"></i></div>
						<h5 class="mt-2">Industry-Aligned Standards</h5>
						<p class="mb-0">Smart-Learn is committed to providing courses that align with and exceed industry standards, ensuring that what you learn is relevant, valuable, and applicable in your chosen field.</p>
					</div>		
				</div>
			</div>
		</div>
	</div>
</section>
<!-- =======================
About END -->

<!-- =======================
Trending courses START -->
<section class="pt-0 pt-md-5">
	<div class="container">
		<!-- Title -->
		<div class="row">
			<div class="col-lg-8 mb-4">
				<h2 class="mb-0">Our <span class="text-warning">Featured</span> Courses</h2>
				<p class="mb-0">Check out some of the available courses</p>
			</div>
		</div>

		<div class="row g-4">
			<!-- Card Item START -->
			<div class="col-md-6 col-xl-4">
				<div class="card p-2 shadow h-100">
					<div class="rounded-top overflow-hidden">
						<div class="card-overlay-hover">
							<!-- Image -->
							<img src="{{ asset('eduport/assets/images/courses/4by3/17.jpg') }}" class="card-img-top" alt="course image">
						</div>
						<!-- Hover element -->
						<div class="card-img-overlay">
							<div class="card-element-hover d-flex justify-content-end">
								<a href="#" class="icon-md bg-white rounded-circle text-center">
									<i class="fas fa-home text-danger"></i>
								</a>
							</div>
						</div>
					</div>
					<!-- Card body -->
					<div class="card-body">
						<!-- Title -->
						<h5 class="card-title"><a href="#">Computer Science</a></h5>
						<!-- Badge -->
						<div class="d-flex justify-content-between align-items-center mb-0">
							<a href="#" class="badge bg-purple bg-opacity-10 text-purple me-2"><i class="fas fa-circle small fw-bold"></i> School of computing and Engineering Sc. </a>
						</div>
						<!-- Divider -->
						<hr>
						<div><p>Learn the principles of programming and much more. Become a computer scientes from home</p></div>
					</div>
				</div>
			</div>	
			<!-- Card Item END -->

			<!-- Card Item START -->
			<div class="col-md-6 col-xl-4">
				<div class="card p-2 shadow h-100">
					<div class="rounded-top overflow-hidden">
						<div class="card-overlay-hover">
							<!-- Image -->
							<img src="{{ asset('eduport/assets/images/courses/4by3/18.jpg') }}" class="card-img-top" alt="course image">						</div>
						<!-- Hover element -->
						<div class="card-img-overlay">
							<div class="card-element-hover d-flex justify-content-end">
								<a href="#" class="icon-md bg-white rounded-circle text-center">
									<i class="fas fa-home text-danger"></i>
								</a>
							</div>
						</div>
					</div>
					<!-- Card body -->
					<div class="card-body">
						<!-- Title -->
						<h5 class="card-title"><a href="#">Business administration</a></h5>
						<!-- Badge -->
						<div class="d-flex justify-content-between align-items-center mb-0">
							<a href="#" class="badge bg-purple bg-opacity-10 text-purple me-2"><i class="fas fa-circle small fw-bold"></i> School of Management Sciences </a>
						</div>
						<!-- Divider -->
						<hr>
						<div><p>In this course you will learn to manage your busness and much more</p></div>
					</div>
				</div>
			</div>	

			<!-- Card Item END -->

			<!-- Card Item START -->
			<div class="col-md-6 col-xl-4">
				<div class="card p-2 shadow h-100">
					<div class="rounded-top overflow-hidden">
						<div class="card-overlay-hover">
							<!-- Image -->
							<img src="{{ asset('eduport/assets/images/courses/4by3/18.jpg') }}" class="card-img-top" alt="course image">						</div>
						<!-- Hover element -->
						<div class="card-img-overlay">
							<div class="card-element-hover d-flex justify-content-end">
								<a href="#" class="icon-md bg-white rounded-circle text-center">
									<i class="fas fa-home text-danger"></i>
								</a>
							</div>
						</div>
					</div>
					<!-- Card body -->
					<div class="card-body">
						<!-- Title -->
						<h5 class="card-title"><a href="#">Business administration</a></h5>
						<!-- Badge -->
						<div class="d-flex justify-content-between align-items-center mb-0">
							<a href="#" class="badge bg-purple bg-opacity-10 text-purple me-2"><i class="fas fa-circle small fw-bold"></i> School of Management Sciences </a>
						</div>
						<!-- Divider -->
						<hr>
						<div><p>In this course you will learn to manage your busness and much more</p></div>
					</div>
				</div>
			</div>	
			<!-- Card Item END -->

			<!-- Card Item START -->
			<div class="col-md-6 col-xl-4">
				<div class="card p-2 shadow h-100">
					<div class="rounded-top overflow-hidden">
						<div class="card-overlay-hover">
							<!-- Image -->
							<img src="{{ asset('eduport/assets/images/courses/4by3/20.jpg') }}" class="card-img-top" alt="course image">
						</div>
						<!-- Hover element -->
						<div class="card-img-overlay">
							<div class="card-element-hover d-flex justify-content-end">
								<a href="#" class="icon-md bg-white rounded-circle text-center">
									<i class="fas fa-shopping-cart text-danger"></i>
								</a>
							</div>
						</div>
					</div>
					<!-- Card body -->
					<div class="card-body">
						<!-- Title -->
						<h5 class="card-title"><a href="#">Business administration</a></h5>
						<!-- Badge -->
						<div class="d-flex justify-content-between align-items-center mb-0">
							<a href="#" class="badge bg-purple bg-opacity-10 text-purple me-2"><i class="fas fa-circle small fw-bold"></i> School of Management Sciences </a>
						</div>
						<!-- Divider -->
						<hr>
						<div><p>In this course you will learn to manage your busness and much more</p></div>
					</div>
				</div>
			</div>
			<!-- Card Item END -->

			<!-- Card Item START -->
			<div class="col-md-6 col-xl-4">
				<div class="card p-2 shadow h-100">
					<div class="rounded-top overflow-hidden">
						<div class="card-overlay-hover">
							<!-- Image -->
							<img src="{{ asset('eduport/assets/images/courses/4by3/15.jpg') }}" class="card-img-top" alt="course image">
						</div>
						<!-- Hover element -->
						<div class="card-img-overlay">
							<div class="card-element-hover d-flex justify-content-end">
								<a href="#" class="icon-md bg-white rounded-circle text-center">
									<i class="fas fa-shopping-cart text-danger"></i>
								</a>
							</div>
						</div>
					</div>
					<!-- Card body -->
					<div class="card-body">
						<!-- Title -->
						<h5 class="card-title"><a href="#">Business administration</a></h5>
						<!-- Badge -->
						<div class="d-flex justify-content-between align-items-center mb-0">
							<a href="#" class="badge bg-purple bg-opacity-10 text-purple me-2"><i class="fas fa-circle small fw-bold"></i> School of Management Sciences </a>
						</div>
						<!-- Divider -->
						<hr>
						<div><p>In this course you will learn to manage your busness and much more</p></div>
					</div>
				</div>
			</div>
			<!-- Card Item END -->

			<!-- Card Item START -->
			<div class="col-md-6 col-xl-4">
				<div class="card p-2 shadow h-100">
					<div class="rounded-top overflow-hidden">
						<div class="card-overlay-hover">
							<!-- Image -->
							<img src="{{ asset('eduport/assets/images/courses/4by3/14.jpg') }}" class="card-img-top" alt="course image">
						</div>
						<!-- Hover element -->
						<div class="card-img-overlay">
							<div class="card-element-hover d-flex justify-content-end">
								<a href="#" class="icon-md bg-white rounded-circle text-center">
									<i class="fas fa-shopping-cart text-danger"></i>
								</a>
							</div>
						</div>
					</div>
					<!-- Card body -->
					<div class="card-body">
						<!-- Title -->
						<h5 class="card-title"><a href="#">Business administration</a></h5>
						<!-- Badge -->
						<div class="d-flex justify-content-between align-items-center mb-0">
							<a href="#" class="badge bg-purple bg-opacity-10 text-purple me-2"><i class="fas fa-circle small fw-bold"></i> School of Management Sciences </a>
						</div>
						<!-- Divider -->
						<hr>
						<div><p>In this course you will learn to manage your busness and much more</p></div>
					</div>
				</div>
			</div>
			<!-- Card Item END -->

		</div>
		<!-- Button -->
		<div class="text-center mt-5">
			<a href="#" class="btn btn-purple-soft mb-0">View more<i class="fas fa-sync ms-2"></i></a>
		</div>
	</div>
</section>
<!-- =======================
Trending courses END -->

<!-- =======================
Video divider START -->
<section class="bg-light position-relative">
	<!-- SVG decoration -->
	<figure class="position-absolute bottom-0 start-0 d-none d-lg-block">
		<svg width="822.2px" height="301.9px" viewbox="0 0 822.2 301.9">
			<path class="fill-warning" d="M752.5,51.9c-4.5,3.9-8.9,7.8-13.4,11.8c-51.5,45.3-104.8,92.2-171.7,101.4c-39.9,5.5-80.2-3.4-119.2-12.1 c-32.3-7.2-65.6-14.6-98.9-13.9c-66.5,1.3-128.9,35.2-175.7,64.6c-11.9,7.5-23.9,15.3-35.5,22.8c-40.5,26.4-82.5,53.8-128.4,70.7 c-2.1,0.8-4.2,1.5-6.2,2.2L0,301.9c3.3-1.1,6.7-2.3,10.2-3.5c46.1-17,88.1-44.4,128.7-70.9c11.6-7.6,23.6-15.4,35.4-22.8 c46.7-29.3,108.9-63.1,175.1-64.4c33.1-0.6,66.4,6.8,98.6,13.9c39.1,8.7,79.6,17.7,119.7,12.1C634.8,157,688.3,110,740,64.6 c4.5-3.9,9-7.9,13.4-11.8C773.8,35,797,16.4,822.2,1l-0.7-1C796.2,15.4,773,34,752.5,51.9z"></path>
		</svg>
	</figure>

	<!-- SVG decoration -->
	<figure class="position-absolute top-0 end-0">
		<svg width="822.2px" height="301.9px" viewbox="0 0 822.2 301.9">
			<path class="fill-purple" d="M752.5,51.9c-4.5,3.9-8.9,7.8-13.4,11.8c-51.5,45.3-104.8,92.2-171.7,101.4c-39.9,5.5-80.2-3.4-119.2-12.1 c-32.3-7.2-65.6-14.6-98.9-13.9c-66.5,1.3-128.9,35.2-175.7,64.6c-11.9,7.5-23.9,15.3-35.5,22.8c-40.5,26.4-82.5,53.8-128.4,70.7 c-2.1,0.8-4.2,1.5-6.2,2.2L0,301.9c3.3-1.1,6.7-2.3,10.2-3.5c46.1-17,88.1-44.4,128.7-70.9c11.6-7.6,23.6-15.4,35.4-22.8 c46.7-29.3,108.9-63.1,175.1-64.4c33.1-0.6,66.4,6.8,98.6,13.9c39.1,8.7,79.6,17.7,119.7,12.1C634.8,157,688.3,110,740,64.6 c4.5-3.9,9-7.9,13.4-11.8C773.8,35,797,16.4,822.2,1l-0.7-1C796.2,15.4,773,34,752.5,51.9z"></path>
		</svg>
	</figure>
	
	<!-- SVG decoration -->
	<figure class="position-absolute bottom-0 start-50 translate-middle-x ms-n9 mb-5">
		<svg width="23px" height="23px">
			<path class="fill-purple" d="M23.003,11.501 C23.003,17.854 17.853,23.003 11.501,23.003 C5.149,23.003 -0.001,17.854 -0.001,11.501 C-0.001,5.149 5.149,-0.000 11.501,-0.000 C17.853,-0.000 23.003,5.149 23.003,11.501 Z"></path>
		</svg>
	</figure>

	<!-- SVG decoration -->
	<figure class="position-absolute bottom-0 end-0 me-5 mb-5">
		<svg width="22px" height="22px">
			<path class="fill-warning" d="M22.003,11.001 C22.003,17.078 17.077,22.003 11.001,22.003 C4.925,22.003 -0.001,17.078 -0.001,11.001 C-0.001,4.925 4.925,-0.000 11.001,-0.000 C17.077,-0.000 22.003,4.925 22.003,11.001 Z"></path>
		</svg>
	</figure>

	<div class="container position-relative">
		<div class="row justify-content-between align-items-center my-5">

			<div class="col-lg-5 position-relative">
				<!-- SVG decoration -->
				<figure class="position-absolute top-0 start-0 translate-middle mt-n5">
					<svg width="29px" height="29px">
						<path class="fill-orange" d="M29.004,14.502 C29.004,22.512 22.511,29.004 14.502,29.004 C6.492,29.004 -0.001,22.512 -0.001,14.502 C-0.001,6.492 6.492,-0.001 14.502,-0.001 C22.511,-0.001 29.004,6.492 29.004,14.502 Z"></path>
						</svg>
				</figure>

				<!-- Title -->
				<h2 class="h1">Study whenever you want, from any place in the world.</h2>
			</div>

			<div class="col-lg-5 position-relative mt-4 mt-lg-0">
				<!-- Image -->
				<img src="{{ asset('eduport/assets/images/about/04.jpg') }}" class="border border-5 border-white rounded-2" alt="">
				<div class="position-absolute top-50 start-50 translate-middle">
					<!-- Video link -->
					<a href="https://www.youtube.com/embed/tXHviS-4ygo" class="btn text-danger btn-round btn-white-shadow btn-lg mb-0" data-glightbox="" data-gallery="video-tour">
						<i class="fas fa-play"></i>
					</a>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- =======================
Video divider END -->


<section class="pt-0 pt-lg-5">
	<div class="container position-relative">
		<!-- SVG decoration START -->
		<figure class="position-absolute top-50 start-50 translate-middle ms-2">
			<svg>
				<path class="fill-white opacity-4" d="m496 22.999c0 10.493-8.506 18.999-18.999 18.999s-19-8.506-19-18.999 8.507-18.999 19-18.999 18.999 8.506 18.999 18.999z"/>
				<path class="fill-white opacity-4" d="m775 102.5c0 5.799-4.701 10.5-10.5 10.5-5.798 0-10.499-4.701-10.499-10.5 0-5.798 4.701-10.499 10.499-10.499 5.799 0 10.5 4.701 10.5 10.499z"/>
				<path class="fill-white opacity-4" d="m192 102c0 6.626-5.373 11.999-12 11.999s-11.999-5.373-11.999-11.999c0-6.628 5.372-12 11.999-12s12 5.372 12 12z"/>
				<path class="fill-white opacity-4" d="m20.499 10.25c0 5.66-4.589 10.249-10.25 10.249-5.66 0-10.249-4.589-10.249-10.249-0-5.661 4.589-10.25 10.249-10.25 5.661-0 10.25 4.589 10.25 10.25z"/>
			</svg>
		</figure>
		<!-- SVG decoration END -->
		
		<div class="row">
			<div class="col-12">
				<div class="bg-purple p-4 p-sm-5 rounded-3">
					<div class="row position-relative">
						<!-- Svg decoration -->
						<figure class="fill-white opacity-1 position-absolute top-50 start-0 translate-middle-y">
							<svg width="141px" height="141px">
								<path	d="M140.520,70.258 C140.520,109.064 109.062,140.519 70.258,140.519 C31.454,140.519 -0.004,109.064 -0.004,70.258 C-0.004,31.455 31.454,-0.003 70.258,-0.003 C109.062,-0.003 140.520,31.455 140.520,70.258 Z"/>
							</svg>
						</figure>
						<!-- Action box -->
						<div class="col-11 mx-auto position-relative">
							<div class="row align-items-center">
								<!-- Title -->
								<div class="col-lg-7">
									<h3 class="text-white">Become an Instructor!</h3>
									<p class="text-white mb-3 mb-lg-0">Apply to become an instructor and start teaching hundreds of students across the world. Display your unique skills with smartlearn</p>
								</div>
								<!-- Content and input -->
								<div class="col-lg-5 text-lg-end">
									<a href="{{ route('lecturersignup') }}" class="btn btn-outline-warning text-white mb-0">Start Teaching Today</a>
								</div>
							</div>
						</div>
					</div> <!-- Row END -->
				</div>
			</div>
		</div> <!-- Row END -->
	</div>
</section>

<!-- =======================
Event START -->
<section class="pb-0 pb-md-5">
	<div class="container">
		<!-- Title -->
		<div class="row mb-4">
			<h2 class="mb-0">Upcoming <span class="text-warning">Education</span> Events</h2>
		</div>
		<div class="row">
			<!-- Slider START -->
			<div class="tiny-slider arrow-round arrow-creative arrow-blur arrow-hover">
				<div class="tiny-slider-inner" data-autoplay="true" data-arrow="true" data-dots="false" data-items-xl="3" data-items-md="2" data-items-xs="1">
					
					<!-- Card item START -->
					<div class="card">
						<div class="position-relative">
							<!-- Image -->
							<img src="{{ asset('eduport/assets/images/courses/4by3/21.jpg') }}" class="card-img" alt="course image">
							<!-- Overlay -->
							<div class="card-img-overlay d-flex align-items-start flex-column p-3">
								<div class="w-100 mt-auto">
									<!-- Category -->
									<a href="#" class="badge text-dark bg-white fs-6 rounded-1"><i class="far fa-calendar-alt text-orange me-2"></i>29 September 2021</a>
								</div>
							</div>
						</div>

						<!-- Card body -->
						<div class='card-body px-2'>
							<!-- Title -->
							<h5 class="card-title"><a href="#">Global Education Fall Meeting for Everyone</a></h5>
							<!-- Address and button -->
							<div class="d-flex justify-content-between align-items-center">
								<address class="mb-0"><i class="fas fa-map-marker-alt me-2"></i>Mumbai</address>
								<a href="#" class="btn btn-sm btn-purple-soft mb-0">Join now</a>
							</div>
						</div>
					</div>
					<!-- Card item END -->

					<!-- Card item START -->
					<div class="card">
						<div class="position-relative">
							<!-- Image -->
							<img src="{{ asset('eduport/assets/images/courses/4by3/16.jpg') }}" class="card-img" alt="course image">
							<!-- Overlay -->
							<div class="card-img-overlay d-flex align-items-start flex-column p-3">
								<div class="w-100 mt-auto">
									<!-- Category -->
									<a href="#" class="badge text-dark bg-white fs-6 rounded-1"><i class="far fa-calendar-alt text-orange me-2"></i>Tomorrow</a>
								</div>
							</div>
						</div>

						<!-- Card body -->
						<div class="card-body px-2">
							<!-- Title -->
							<h5 class="card-title"><a href="#">International Conference on Information Technology</a></h5>
							<!-- Address and button -->
							<div class="d-flex justify-content-between align-items-center">
								<address class="mb-0"><i class="fas fa-map-marker-alt me-2"></i>New york</address>
								<a href="#" class="btn btn-sm btn-purple-soft mb-0">Join now</a>
							</div>
						</div>
					</div>
					<!-- Card item END -->

					<!-- Card item START -->
					<div class="card">
						<div class="position-relative">
							<!-- Image -->
							<img src="{{ asset('eduport/assets/images/courses/4by3/18.jpg') }}" class="card-img" alt="course image">
							<!-- Overlay -->
							<div class="card-img-overlay d-flex align-items-start flex-column p-3">
								<div class="w-100 mt-auto">
									<!-- Category -->
									<a href="#" class="badge text-dark bg-white fs-6 rounded-1"><i class="far fa-calendar-alt text-orange me-2"></i>2 July 2022</a>
								</div>
							</div>
						</div>

						<!-- Card body -->
						<div class="card-body px-2">
							<!-- Title -->
							<h5 class="card-title"><a href="#">UK Demo Day 2022</a></h5>
							<!-- Address and button -->
							<div class="d-flex justify-content-between align-items-center">
								<address class="mb-0"><i class="fas fa-map-marker-alt me-2"></i>California</address>
								<a href="#" class="btn btn-sm btn-purple-soft mb-0">Join now</a>
							</div>
						</div>
					</div>
					<!-- Card item END -->

					<!-- Card item START -->
					<div class="card">
						<div class="position-relative">
							<!-- Image -->
							<img src="{{ asset("eduport/assets/images/courses/4by3/17.jpg") }}" class="card-img" alt="course image">
							<!-- Overlay -->
							<div class="card-img-overlay d-flex align-items-start flex-column p-3">
								<div class="w-100 mt-auto">
									<!-- Category -->
									<a href="#" class="badge text-dark bg-white fs-6 rounded-1"><i class="far fa-calendar-alt text-orange me-2"></i>29 September 2021</a>
								</div>
							</div>
						</div>

						<!-- Card body -->
						<div class="card-body px-2">
							<!-- Title -->
							<h5 class="card-title"><a href="#">Personality Development Tour</a></h5>
							<!-- Address and button -->
							<div class="d-flex justify-content-between align-items-center">
								<address class="mb-0"><i class="fas fa-map-marker-alt me-2"></i>London</address>
								<a href="#" class="btn btn-sm btn-purple-soft mb-0">Join now</a>
							</div>
						</div>
					</div>
					<!-- Card item END -->

					<!-- Card item START -->
					<div class="card">
						<div class="position-relative">
							<!-- Image -->
							<img src="{{ asset("eduport/assets/images/courses/4by3/19.jpg") }}" class="card-img" alt="course image">
							<!-- Overlay -->
							<div class="card-img-overlay d-flex align-items-start flex-column p-3">
								<div class="w-100 mt-auto">
									<!-- Category -->
									<a href="#" class="badge text-success bg-white fs-6 rounded-1"><i class="fas fa-circle text-success me-2"></i>Live</a>
								</div>
							</div>
						</div>

						<!-- Card body -->
						<div class="card-body px-2">
							<!-- Title -->
							<h5 class="card-title"><a href="#">Global Education Fall Meeting for Everyone</a></h5>
							<!-- Address and button -->
							<div class="d-flex justify-content-between align-items-center">
								<address class="mb-0"><i class="fas fa-map-marker-alt me-2"></i>Delhi</address>
								<a href="#" class="btn btn-sm btn-purple-soft mb-0">Join now</a>
							</div>
						</div>
					</div>
					<!-- Card item END -->

				</div>
			</div>
			<!-- Slider END -->
		</div>
	</div>
</section>
<!-- =======================
Event END -->

<!-- =======================
Newsletter START -->
<section class="mb-n6 position-relative z-index-9">
	<div class="container">
		<div class="row">
			<div class="col-11 col-md-10 mx-auto">
				<div class="navbar-top navbar-dark rounded-3 shadow p-3 p-sm-4 position-relative overflow-hidden">
					<!-- SVG decoration -->
					<figure class="position-absolute top-100 start-100 translate-middle mt-n6 ms-n5">
						<svg width="211px" height="211px">
							<path class="fill-white opacity-4" d="M210.030,105.011 C210.030,163.014 163.010,210.029 105.012,210.029 C47.013,210.029 -0.005,163.014 -0.005,105.011 C-0.005,47.015 47.013,-0.004 105.012,-0.004 C163.010,-0.004 210.030,47.015 210.030,105.011 Z"></path>
						</svg>
					</figure>
					<!-- SVG decoration -->
					<figure class="position-absolute top-100 start-0 translate-middle mt-n6 ms-5">
						<svg width="141px" height="141px">
							<path class="fill-white opacity-4" d="M140.520,70.258 C140.520,109.064 109.062,140.519 70.258,140.519 C31.454,140.519 -0.004,109.064 -0.004,70.258 C-0.004,31.455 31.454,-0.003 70.258,-0.003 C109.062,-0.003 140.520,31.455 140.520,70.258 Z"></path>
						</svg>
					</figure>
					<!-- SVG decoration -->
					<figure class="position-absolute top-0 start-50 mt-4 ms-n9">
						<svg width="41px" height="41px">
							<path class="fill-white opacity-4" d="M40.531,20.265 C40.531,31.458 31.457,40.531 20.265,40.531 C9.072,40.531 -0.001,31.458 -0.001,20.265 C-0.001,9.073 9.072,-0.001 20.265,-0.001 C31.457,-0.001 40.531,9.073 40.531,20.265 Z"></path>
						</svg>
					</figure>

					<!-- Icon logos START -->
					<div class="p-2 bg-white shadow rounded-3 rotate-74 position-absolute top-0 start-0 ms-3 mt-5 d-none d-sm-block">
						<img src="{{ asset('eduport/assets/images/client/science.svg') }}" class="h-40px" alt="Icon">
					</div>
					<div class="p-1 bg-white shadow rounded-3 rotate-74 position-absolute top-0 end-0 mt-5 me-5 d-none d-sm-block">
						<img src="{{ asset('eduport/assets/images/client/angular.svg') }}" class="h-30px" alt="Icon">
					</div>
					<div class="p-2 bg-white shadow rounded-3 rotate-130 position-absolute bottom-0 start-50 ms-5 mb-2 d-none d-lg-block">
						<img src="{{ asset('eduport/assets/images/client/figma.svg') }}" class="h-20px" alt="Icon">
					</div>
					<!-- Icon logos END -->

					<div class="row">
						<div class="col-md-8 mx-auto text-center py-4 position-relative">
							<!-- Title -->
							<h2>Subscribe to our Newsletter for Newest Course Updates</h2>
							<!-- Form -->
							<form class="row align-items-center justify-content-center mt-3">
								<div class="col-lg-8">
									<div class="bg-body shadow rounded-pill p-2">
										<div class="input-group">
											<input class="form-control border-0 me-1" type="email" placeholder="Enter your email">
											<button type="button" class="btn btn-blue mb-0 rounded-pill">Subscribe!</button>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div> 
					<!-- Row END -->
				</div>
			</div>
		</div> <!-- Row END -->
	</div>
</section>
<!-- =======================
Newsletter END -->
<br>

@endsection

@section('scripts')
    <!-- Bootstrap JS -->
<script src="{{ asset('eduport/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>

<!-- Vendors -->
<script src="{{ asset('eduport/assets/vendor/tiny-slider/tiny-slider.js') }}"></script>
<script src="{{ asset('eduport/assets/vendor/glightbox/js/glightbox.js') }}"></script>
<script src="https://kit.fontawesome.com/201e2d289f.js" crossorigin="anonymous"></script>

<!-- Template Functions -->
<script src="{{ asset('eduport/assets/js/functions.js') }}"></script>
@endsection


