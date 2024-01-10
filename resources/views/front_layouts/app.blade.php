<!DOCTYPE html>
<html lang="en">
<head>
	<title>SMARTLEARN - LMS</title>

	<!-- Meta Tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="author" content="Webestica.com">
	<meta name="description" content="SmartLearn- Your go to Learning Classroom">

	<!-- Favicon -->
	<link rel="shortcut icon" href="{{ asset('eduport/assets/images/favicon.svg') }}">


	<!-- Google Font -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;700&family=Roboto:wght@400;500;700&display=swap">

	<!-- Plugins CSS -->
	<link rel="stylesheet" type="text/css" href="{{ asset('eduport/assets/vendor/font-awesome/css/all.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('eduport/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('eduport/assets/vendor/tiny-slider/tiny-slider.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('eduport/assets/vendor/glightbox/css/glightbox.css') }}">

	<!-- Theme CSS -->
	<link id="style-switch" rel="stylesheet" type="text/css" href="{{ asset('eduport/assets/css/style.css') }}">

</head>

<body>

<!-- Top header START -->
@include('front_layouts.topheader')
<!-- Top header END -->

<!-- Header START -->
@include('front_layouts.navbar')
<!-- Header END -->

<!-- **************** MAIN CONTENT START **************** -->
<main>
@yield('content')
</main>
<!-- **************** MAIN CONTENT END **************** -->

<!-- =======================
Footer START -->
@include('front_layouts.footer')
<!-- =======================
Footer END -->

<!-- Back to top -->
<div class="back-top"><i class="bi bi-arrow-up-short position-absolute top-50 start-50 translate-middle"></i></div>

@include('front_layouts.scripts')

</body>
</html>