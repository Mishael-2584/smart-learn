<!DOCTYPE html>
<html lang="en">

<!-- blank.html  Tue, 07 Jan 2020 03:35:42 GMT -->
<head>
<meta charset="UTF-8">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">

<title>SMARTLEARN</title>

<!-- General CSS Files -->
<link rel="stylesheet" href="{{ asset('codiepie/assets/modules/bootstrap/css/bootstrap.min.css') }}">
{{-- <link rel="stylesheet" href="{{ asset('codiepie/assets/modules/fontawesome/css/all.min.css') }}"> --}}

<link rel="shortcut icon" href="{{ asset('eduport/assets/images/favicon.svg') }}">

<!-- CSS Libraries -->
<link rel="stylesheet" href="{{ asset("codiepie/assets/modules/datatables/datatables.min.css") }}">
<link rel="stylesheet" href="{{ asset("codiepie/assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css") }}">
<link rel="stylesheet" href="{{ asset("codiepie/assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css") }}">
<link rel="stylesheet" href="{{ asset("codiepie/assets/modules/bootstrap-social/bootstrap-social.css") }}">
<link rel="stylesheet" href="{{ asset("codiepie/assets/modules/summernote/summernote-bs4.css") }}">
<link rel="stylesheet" href="{{ asset("codiepie/assets/modules/select2/dist/css/select2.min.css") }}">
<link rel="stylesheet" href="{{ asset("codiepie/assets/modules/jquery-selectric/selectric.css") }}">
<link rel="stylesheet" href="{{ asset("codiepie/assets/modules/prism/prism.css") }} ">
{{-- Font Awesome --}}


<!-- Template CSS -->

<link rel="stylesheet" href="{{ asset("codiepie/assets/css/style.min.css") }}">
<link rel="stylesheet" href="{{ asset("codiepie/assets/css/components.min.css") }}">


<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">


</head>

<body class="layout-4">
 <!-- Page Loader -->
@include('layouts.loader')

@yield('body')



</body>

<!-- blank.html  Tue, 07 Jan 2020 03:35:42 GMT -->
</html>