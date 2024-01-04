<!DOCTYPE html>
<html lang="en">
<head>
	<title>SMARTLEARN - Sign Up</title>

	<!-- Meta Tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="author" content="Webestica.com">
	<meta name="description" content="Eduport, Education and Course Theme">

	<!-- Favicon -->
	<link rel="shortcut icon" href="{{ asset("eduport/assets/images/favicon.ico") }}">

	<!-- Google Font -->
	{{-- <link rel="preconnect" href="https://fonts.googleapis.com"> --}}
	{{-- <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> --}}
	{{-- <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;700&family=Roboto:wght@400;500;700&display=swap"> --}}

	<!-- Plugins CSS -->
	<link rel="stylesheet" type="text/css" href="{{ asset("eduport/assets/vendor/font-awesome/css/all.min.css") }}">
	<link rel="stylesheet" type="text/css" href="{{ asset("eduport/assets/vendor/bootstrap-icons/bootstrap-icons.css") }}">

	<!-- Theme CSS -->
	<link id="style-switch" rel="stylesheet" type="text/css" href="{{ asset("eduport/assets/css/style.css") }}">

</head>

<body>

<!-- **************** MAIN CONTENT START **************** -->
<main>
	<section class="p-0 d-flex align-items-center position-relative overflow-hidden">
	
		<div class="container-fluid">
			<div class="row">
				<!-- left -->
				<div class="col-12 col-lg-6 d-md-flex align-items-center justify-content-center bg-primary bg-opacity-10 vh-lg-100">
					<div class="p-3 p-lg-5">
						<!-- Title -->
						<div class="text-center">
                            
                            <h2 class="fw-bold">Welcome to SMARTLEARN</h2>
							<!-- SVG Image -->
						<img src="{{ asset("codiepie/assets/img/smartlearn-logo/svg/smartlearn-high-resolution-logo-white-transparent.svg") }}" class="mt-5" alt="">
							<p class="mb-0 h6 fw-light"!</p>
						</div>
						{{-- <!-- SVG Image --> --}}
						{{-- <img src="{{ asset("codiepie/assets/img/smartlearn-logo/svg/smartlearn-high-resolution-logo-white-transparent.svg") }}" class="mt-5" alt=""> --}}
						<!-- Info -->
						<div class="d-sm-flex mt-5 align-items-center justify-content-center">
							<ul class="avatar-group mb-2 mb-sm-0">
								<li class="avatar avatar-sm"><img class="avatar-img rounded-circle" src="{{ asset("eduport/assets/images/avatar/01.jpg") }}" alt="avatar"></li>
								<li class="avatar avatar-sm"><img class="avatar-img rounded-circle" src="{{ asset("eduport/assets/images/avatar/02.jpg") }}" alt="avatar"></li>
								<li class="avatar avatar-sm"><img class="avatar-img rounded-circle" src="{{ asset("eduport/assets/images/avatar/03.jpg") }}" alt="avatar"></li>
								<li class="avatar avatar-sm"><img class="avatar-img rounded-circle" src="{{ asset("eduport/assets/images/avatar/04.jpg") }}" alt="avatar"></li>
							</ul>
							<!-- Content -->
							<p class="mb-0 h6 fw-light ms-0 ms-sm-3"> Join Our Community Today and learn something new.</p>
						</div>
					</div>
				</div>
				@include('layouts.error')
				<!-- Right -->
				<div class="col-12 col-lg-6 m-auto bg-white bg-opacity-10">
					<div class="row my-5">
						<div class="col-sm-10 col-xl-8 m-auto">
							<!-- Title -->
							<img src="{{ asset("eduport/assets/images/element/03.svg") }}" class="h-40px mb-2" alt="">
							<h2>Sign up for your account!</h2>
							<p class="lead mb-4">Nice to see you! Please Sign up with your account.</p>
						
							<!-- Form START -->
							<form method="post" action="{{ route('studentssubmit') }}">
								@csrf
								<!-- Name -->
								<div class="mb-4">
									<label for="name" class="form-label">Full Name *</label>
									<div class="input-group input-group-lg">
										<span class="input-group-text bg-light rounded-start border-0 text-secondary px-3"><i class="bi bi-person-fill"></i></span>
										<input type="name" class="form-control border-0 bg-light rounded-end ps-1" placeholder="Full Name" id="exampleName" name="name">
									</div>
								</div>
								<!-- Email -->
								<div class="mb-4">
									<label for="exampleInputEmail1" class="form-label">Email address *</label>
									<div class="input-group input-group-lg">
										<span class="input-group-text bg-light rounded-start border-0 text-secondary px-3"><i class="bi bi-envelope-fill"></i></span>
										<input type="email" class="form-control border-0 bg-light rounded-end ps-1" placeholder="E-mail" id="exampleInputEmail1" name="email">
									</div>
								</div>
                                <!-- Matric Number -->
                                <div class="mb-4">
                                    <label for="matric" class="form-label">Matric Number *</label>
                                    <div class="input-group input-group-lg">
                                        <span class="input-group-text bg-light rounded-start border-0 text-secondary px-3"><i class="fa-solid fa-graduation-cap"></i></span>
                                        <input type="matric" class="form-control border-0 bg-light rounded-end ps-1" placeholder="Matric-Number" id="matric" name="matric">
                                    </div>
                                </div>
								<!-- Password -->
								<div class="mb-4">
									<label for="inputPassword5" class="form-label">Password *</label>
									<div class="input-group input-group-lg">
										<span class="input-group-text bg-light rounded-start border-0 text-secondary px-3"><i class="fas fa-lock"></i></span>
										<input type="password" class="form-control border-0 bg-light rounded-end ps-1" placeholder="*********" id="inputPassword5" name="password">
									</div>
								</div>
								<!-- Confirm Password -->
								<div class="mb-4">
									<label for="inputPassword6" class="form-label">Confirm Password *</label>
									<div class="input-group input-group-lg">
										<span class="input-group-text bg-light rounded-start border-0 text-secondary px-3"><i class="fas fa-lock"></i></span>
										<input type="password" class="form-control border-0 bg-light rounded-end ps-1" placeholder="*********" id="inputPassword6" name="password_confirmation">
									</div>
								</div>
								<!-- Check box -->
								<div class="mb-4">
									<div class="form-check">
										<input type="checkbox" class="form-check-input" id="checkbox-1" required>
										<label class="form-check-label" for="checkbox-1">By signing up, you agree to the<a href="#"> terms of service</a></label>
									</div>
								</div>
								<!-- Button -->
								<div class="align-items-center mt-0">
									<div class="d-grid">
										<button class="btn btn-primary mb-0" type="submit">Sign Up</button>
									</div>
								</div>
							</form>
							<!-- Form END -->

							<!-- Social buttons -->
							<div class="row">
								<!-- Divider with text -->
								<div class="position-relative my-4">
									<hr>
									<p class="small position-absolute top-50 start-50 translate-middle bg-body px-5">Or</p>
								</div>
								<!-- Social btn -->
								<div class="col-xxl-6 d-grid">
									<a href="#" class="btn bg-google mb-2 mb-xxl-0"><i class="fab fa-fw fa-google text-white me-2"></i>Signup with Google</a>
								</div>
								<!-- Social btn -->
								<div class="col-xxl-6 d-grid">
									<a href="#" class="btn bg-facebook mb-0"><i class="fab fa-fw fa-facebook-f me-2"></i>Signup with Facebook</a>
								</div>
							</div>

							<!-- Sign up link -->
							<div class="mt-4 text-center">
								<span>Already have an account?<a href="sign-in.html"> Sign in here</a></span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</main>
<!-- **************** MAIN CONTENT END **************** -->

<!-- Back to top -->
<div class="back-top"><i class="bi bi-arrow-up-short position-absolute top-50 start-50 translate-middle"></i></div>
<script src="https://kit.fontawesome.com/201e2d289f.js" crossorigin="anonymous"></script>
<!-- Bootstrap JS -->
{{-- <script src="{{ asset("eduport/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js") }}"></script> --}}

<!-- Template Functions -->
{{-- <script src="{{ asset("eduport/assets/js/functions.js") }}"></script> --}}

</body>
</html>