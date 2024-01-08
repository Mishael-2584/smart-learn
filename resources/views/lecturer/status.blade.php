@extends('layouts.body')

@section('content')

<div class="main-content">
    <section class="section">
        @include('layouts.error')
        <div class="section-header">
            <h1>WELCOME</h1>
        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-12 mb-4">
                    <div class="hero bg-primary text-white">
                        <div class="hero-inner">
                            <h2>Welcome! @isset($lecturer) {{$lecturer->name}} @endisset</h2>
                            <p class="lead">Welcome to Smart Learn. We are thrilled to have you join us. Please complete the information about your account to complete registration and get verified to use our platform as a Lecturer</p>
                            <div class="mt-4">
                                <a href="{{ route('lecturerprofileinfo') }}" class="btn btn-outline-white btn-lg btn-icon icon-left"><i class="far fa-user"></i> Setup Account</a>
                            </div>
                        </div>
                    </div>
                </div>

                
            </div>

        </div>
    </section>
</div>
    
@endsection

@section('scripts')
    
@endsection