@extends('layouts.app')



@section('body')
<div id="app">
    <div class="main-wrapper main-wrapper-1">
        <div class="navbar-bg"></div>
        
        <!-- Start app top navbar -->
        @include('layouts.navbar')

        
        

        <!-- Start main left sidebar menu -->
        @include('layouts.leftsidebar')

       
        

        <!-- Start app main Content -->
        @yield('content')
        

        <!-- Start app Footer part -->
        @include('layouts.footer')
        
    </div>
</div>

<!-- General JS Scripts -->
@include('layouts.scripts')
@yield('scripts')
@endsection

