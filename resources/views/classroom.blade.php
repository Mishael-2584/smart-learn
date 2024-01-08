@extends('.front_layouts.app')

@section('content')
<!-- =======================
Trending courses START -->
<section class="pt-0 pt-md-5">
	<div class="container">
		<!-- Title -->
		<div class="row">
			<div class="col-lg-8 mb-4">
				<h2 class="mb-0">Student <span class="text-secondary">Class</span> Room</h2>
				<p class="mb-0">Select one of the registered courses to engage</p>
			</div>
		</div>

		<div class="row g-4">
			<!-- Card Item START -->
			<div class="col-md-4 col-xl-3">
				<div class="card p-2 shadow h-100">
					<div class="rounded-top overflow-hidden">
						<div class="card-overlay-hover">
							<!-- Image -->
							<img src="{{ asset('eduport/assets/images/courses/4by3/17.jpg') }}" class="card-img-top" alt="course image">
						</div>
						<!-- Hover element -->
						<div class="card-img-overlay">
							<div class="card-element-hover d-flex justify-content-end">
								<div class="dropdown">
								<a href="#" class=" text-center " role="button" data-bs-toggle="dropdown" aria-expanded="false">
									<i class="fas fa-ellipsis-h text-dark icon-md bg-white rounded-circle"></i>
									<ul class="dropdown-menu me-3">
										<li><a class="dropdown-item  text-purple" href="{{ route('studentclassroom') }}">Open</a></li>
										<li><a class="dropdown-item  text-purple" href="#">Unenroll</a></li>
										<li><a class="dropdown-item  text-purple" href="#">Report</a></li>
									</ul>


								</a>
								</div>
							</div>
						</div>
					</div>
					<!-- Card body -->
					<div class="card-body bg-success">
						<!-- Title -->
						<h5 class="card-title"><a href="{{ route('lecturersignup') }}">COSC 201. Intro to Java</a></h5>
						<!-- Badge -->
						<div class="d-flex justify-content-between align-items-center mb-0">
							<a href="#" class="badge bg-purple bg-opacity-10 text-purple me-2"><i class="fas fa-circle small fw-bold"></i> 2023/2024 </a>
						</div>
						<!-- Divider -->
						<hr>
						<div><p class="text-muted">Bill Medina E.</p></div>
					</div>
				</div>
			</div>	
			<!-- Card Item END -->

			<!-- Card Item START -->
			<div class="col-md-4 col-xl-3">
				<div class="card p-2 shadow h-100">
					<div class="rounded-top overflow-hidden">
						<div class="card-overlay-hover">
							<!-- Image -->
							<img src="{{ asset('eduport/assets/images/courses/4by3/18.jpg') }}" class="card-img-top" alt="course image">						</div>
						<!-- Hover element -->
						<div class="card-img-overlay">
							<div class="card-element-hover d-flex justify-content-end">
							<div class="dropdown">
								<a href="#" class="  text-center " role="button" data-bs-toggle="dropdown" aria-expanded="false">
									<i class="fas fa-ellipsis-h text-dark  icon-md bg-white rounded-circle"></i>
									<ul class="dropdown-menu me-3">
										<li><a class="dropdown-item text-purple" href="#">Open</a></li>
										<li><a class="dropdown-item text-purple" href="#">Unenroll</a></li>
										<li><a class="dropdown-item text-purple" href="#">Report</a></li>
									</ul>


								</a>
								</div>
							</div>
						</div>
					</div>
					<!-- Card body -->
					<div class="card-body bg-dark">
						<!-- Title -->
						<h5 class="card-title"><a href="#" class="text-light">COSC 201 Programing with C++</a></h5>
						<!-- Badge -->
						<div class="d-flex justify-content-between align-items-center mb-0">
							<a href="#" class="badge bg-purple bg-opacity-10 text-purple me-2"><i class="fas fa-circle small fw-bold"></i> 2019/2020 </a>
						</div>
						<!-- Divider -->
						<hr>
						<div><p class="text-muted">Aderonke Adebenjo</p></div>
					</div>
				</div>
			</div>	

			<!-- Card Item END -->

			<!-- Card Item START -->
			<div class="col-md-4 col-xl-3">
				<div class="card p-2 shadow h-100">
					<div class="rounded-top overflow-hidden">
						<div class="card-overlay-hover">
							<!-- Image -->
							<img src="{{ asset('eduport/assets/images/courses/4by3/18.jpg') }}" class="card-img-top" alt="course image">						</div>
						<!-- Hover element -->
						<div class="card-img-overlay">
							<div class="card-element-hover d-flex justify-content-end">
							<div class="dropdown">
								<a href="#" class=" text-center " role="button" data-bs-toggle="dropdown" aria-expanded="false">
									<i class="fas fa-ellipsis-h text-dark icon-md bg-white rounded-circle"></i>
									<ul class="dropdown-menu me-3">
										<li><a class="dropdown-item  text-purple" href="{{ route('studentssignup') }}">Open</a></li>
										<li><a class="dropdown-item  text-purple" href="#">Unenroll</a></li>
										<li><a class="dropdown-item  text-purple" href="#">Report</a></li>
									</ul>


								</a>
								</div>
							</div>
						</div>
					</div>
					<!-- Card body -->
					<div class="card-body">
						<!-- Title -->
						<h5 class="card-title"><a href="#">Modeling y Simultion</a></h5>
						<!-- Badge -->
						<div class="d-flex justify-content-between align-items-center mb-0">
							<a href="#" class="badge bg-purple bg-opacity-10 text-purple me-2"><i class="fas fa-circle small fw-bold"></i> 2023/2024 </a>
						</div>
						<!-- Divider -->
						<hr>
						<div><p class="text-muted">Pelayo Leon Esplendida</p></div>
					</div>
				</div>
			</div>	
			<!-- Card Item END -->

			<!-- Card Item START -->
			<div class="col-md-4 col-xl-3">
				<div class="card p-2 shadow h-100">
					<div class="rounded-top overflow-hidden">
						<div class="card-overlay-hover">
							<!-- Image -->
							<img src="{{ asset('eduport/assets/images/courses/4by3/20.jpg') }}" class="card-img-top" alt="course image">
						</div>
						<!-- Hover element -->
						<div class="card-img-overlay">
							<div class="card-element-hover d-flex justify-content-end">
							<div class="dropdown">
								<a href="#" class=" text-center " role="button" data-bs-toggle="dropdown" aria-expanded="false">
									<i class="fas fa-ellipsis-h text-dark icon-md bg-white rounded-circle"></i>
									<ul class="dropdown-menu me-3">
										<li><a class="dropdown-item  text-purple" href="{{ route('studentssignup') }}">Open</a></li>
										<li><a class="dropdown-item  text-purple" href="#">Unenroll</a></li>
										<li><a class="dropdown-item  text-purple" href="#">Report</a></li>
									</ul>


								</a>
								</div>
							</div>
						</div>
					</div>
					<!-- Card body -->
					<div class="card-body bg-primary">
						<!-- Title -->
						<h5 class="card-title"><a href="#" class="text-light">Operation Research</a></h5>
						<!-- Badge -->
						<div class="d-flex justify-content-between align-items-center mb-0">
							<a href="#" class="badge bg-white bg-opacity-10 text-purple me-2"><i class="fas fa-circle small fw-bold"></i> 2022/2023 </a>
						</div>
						<!-- Divider -->
						<hr>
						<div ><p class="text-muted">Ada Adebanjo Olubami</p></div>
					</div>
				</div>
			</div>
			<!-- Card Item END -->

			<!-- Card Item START -->
			<div class="col-md-4 col-xl-3">
				<div class="card p-2 shadow h-100">
					<div class="rounded-top overflow-hidden">
						<div class="card-overlay-hover">
							<!-- Image -->
							<img src="{{ asset('eduport/assets/images/courses/4by3/15.jpg') }}" class="card-img-top" alt="course image">
						</div>
						<!-- Hover element -->
						<div class="card-img-overlay">
							<div class="card-element-hover d-flex justify-content-end">
							<div class="dropdown">
								<a href="#" class=" text-center " role="button" data-bs-toggle="dropdown" aria-expanded="false">
									<i class="fas fa-ellipsis-h text-dark icon-md bg-white rounded-circle"></i>
									<ul class="dropdown-menu me-3">
										<li><a class="dropdown-item  text-purple" href="{{ route('studentssignup') }}">Open</a></li>
										<li><a class="dropdown-item  text-purple" href="#">Unenroll</a></li>
										<li><a class="dropdown-item  text-purple" href="#">Report</a></li>
									</ul>


								</a>
								</div>
							</div>
						</div>
					</div>
					<!-- Card body -->
					<div class="card-body">
						<!-- Title -->
						<h5 class="card-title"><a href="#">SENG 400. Softwere Testing</a></h5>
						<!-- Badge -->
						<div class="d-flex justify-content-between align-items-center mb-0">
							<a href="#" class="badge bg-purple bg-opacity-10 text-purple me-2"><i class="fas fa-circle small fw-bold"></i> 2021/2022 </a>
						</div>
						<!-- Divider -->
						<hr>
						<div><p class="text-muted">Alao Adediran Joseph</p></div>
					</div>
				</div>
			</div>
			<!-- Card Item END -->

			<!-- Card Item START -->
			<div class="col-md-4 col-xl-3">
				<div class="card p-2 shadow h-100">
					<div class="rounded-top overflow-hidden">
						<div class="card-overlay-hover">
							<!-- Image -->
							<img src="{{ asset('eduport/assets/images/courses/4by3/14.jpg') }}" class="card-img-top" alt="course image">
						</div>
						<!-- Hover element -->
						<div class="card-img-overlay">
							<div class="card-element-hover d-flex justify-content-end">
							<div class="dropdown">
								<a href="#" class=" text-center " role="button" data-bs-toggle="dropdown" aria-expanded="false">
									<i class="fas fa-ellipsis-h text-dark icon-md bg-white rounded-circle"></i>
									<ul class="dropdown-menu me-3">
										<li><a class="dropdown-item  text-purple" href="{{ route('studentssignup') }}">Open</a></li>
										<li><a class="dropdown-item  text-purple" href="#">Unenroll</a></li>
										<li><a class="dropdown-item  text-purple" href="#">Report</a></li>
									</ul>


								</a>
								</div>
							</div>
						</div>
					</div>
					<!-- Card body -->
					<div class="card-body bg-primary">
						<!-- Title -->
						<h5 class="card-title"><a href="#" class="text-light">Research Methodoogy</a></h5>
						<!-- Badge -->
						<div class="d-flex justify-content-between align-items-center mb-0">
							<a href="#" class="badge bg-white bg-opacity-10 text-purple me-2"><i class="fas fa-circle small fw-bold"></i> 2023/2024 </a>
						</div>
						<!-- Divider -->
						<hr>
						<div><p class="text-muted">Dr. Seun Ebisuwa </p></div>
					</div>
				</div>
			</div>
			<!-- Card Item END -->

				<!-- Card Item START -->
				<div class="col-md-4 col-xl-3">
				<div class="card p-2 shadow h-100">
					<div class="rounded-top overflow-hidden">
						<div class="card-overlay-hover">
							<!-- Image -->
							<img src="{{ asset('eduport/assets/images/courses/4by3/18.jpg') }}" class="card-img-top" alt="course image">						</div>
						<!-- Hover element -->
						<div class="card-img-overlay">
							<div class="card-element-hover d-flex justify-content-end">
							<div class="dropdown">
								<a href="#" class=" text-center " role="button" data-bs-toggle="dropdown" aria-expanded="false">
									<i class="fas fa-ellipsis-h text-dark icon-md bg-white rounded-circle"></i>
									<ul class="dropdown-menu me-3">
										<li><a class="dropdown-item  text-purple" href="{{ route('studentssignup') }}">Open</a></li>
										<li><a class="dropdown-item  text-purple" href="#">Unenroll</a></li>
										<li><a class="dropdown-item  text-purple" href="#">Report</a></li>
									</ul>


								</a>
								</div>
							</div>
						</div>
					</div>
					<!-- Card body -->
					<div class="card-body bg-success">
						<!-- Title -->
						<h5 class="card-title"><a href="#">COSC 400. Artificial Intelligence</a></h5>
						<!-- Badge -->
						<div class="d-flex justify-content-between align-items-center mb-0">
							<a href="#" class="badge bg-purple bg-opacity-10 text-purple me-2"><i class="fas fa-circle small fw-bold"></i> 2023/2024 </a>
						</div>
						<!-- Divider -->
						<hr>
						<div><p class="text-muted">Ajayi Oluwabucola D</p></div>
					</div>
				</div>
			</div>	

			<!-- Card Item END -->

			<!-- Card Item START -->
			<div class="col-md-4 col-xl-3">
				<div class="card p-2 shadow h-100">
					<div class="rounded-top overflow-hidden">
						<div class="card-overlay-hover">
							<!-- Image -->
							<img src="{{ asset('eduport/assets/images/courses/4by3/18.jpg') }}" class="card-img-top" alt="course image">						</div>
						<!-- Hover element -->
						<div class="card-img-overlay">
							<div class="card-element-hover d-flex justify-content-end">
							<div class="dropdown">
								<a href="#" class=" text-center " role="button" data-bs-toggle="dropdown" aria-expanded="false">
									<i class="fas fa-ellipsis-h text-dark icon-md bg-white rounded-circle"></i>
									<ul class="dropdown-menu me-3">
										<li><a class="dropdown-item  text-purple" href="{{ route('studentssignup') }}">Open</a></li>
										<li><a class="dropdown-item  text-purple" href="#">Unenroll</a></li>
										<li><a class="dropdown-item  text-purple" href="#">Report</a></li>
									</ul>


								</a>
								</div>
							</div>
						</div>
					</div>
					<!-- Card body -->
					<div class="card-body bg-dark">
						<!-- Title -->
						<h5 class="card-title"><a href="#" class="text-light">IGTY 202. Linux studies</a></h5>
						<!-- Badge -->
						<div class="d-flex justify-content-between align-items-center mb-0">
							<a href="#" class="badge bg-purple bg-opacity-10 text-purple me-2"><i class="fas fa-circle small fw-bold"></i> 2023/2024 </a>
						</div>
						<!-- Divider -->
						<hr>
						<div><p class="text-muted">Worancha Mishael G.</p></div>
					</div>
				</div>
			</div>	

		</div>
		<!-- Button -->
		<div class="text-center mt-5">
			<a href="#" class="btn btn-purple-soft mb-0">View more<i class="fas fa-sync ms-2"></i></a>
		</div>
	</div>
</section>
<!-- =======================
Trending courses END -->

@endsection

@section('scripts')
    <!-- Bootstrap JS  -->
<script src="{{ asset('eduport/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>

<!-- Vendors -->
<script src="{{ asset('eduport/assets/vendor/tiny-slider/tiny-slider.js') }}"></script>
<script src="{{ asset('eduport/assets/vendor/glightbox/js/glightbox.js') }}"></script>
<script src="https://kit.fontawesome.com/201e2d289f.js" crossorigin="anonymous"></script>

<!-- Template Functions -->
<!-- <script src="{{ asset('eduport/assets/js/functions.js') }}"></script> -->
@endsection
