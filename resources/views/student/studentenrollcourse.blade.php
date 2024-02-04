@extends('layouts.body')

@section('content')

<div class="main-content">
    <section class="section">
        @include('layouts.error')
        <div class="section-body">
            <br>
            <div class="section-header">
                <h1>Enroll Course</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Classroom</a></div>
                    <div class="breadcrumb-item">Enroll Course</div>
                </div>
            </div>
            <h2 class="section-title">Add a new course</h2>
            <p class="section-lead">Fill the form to add a new course</p>

            <div class="row">
                <div class="col-12 col-sm-12 col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <ul class="nav nav-pills" id="myTab3" role="tablist">
                                <li class="nav-item"><a class="nav-link active" id="departmental-courses-tab"
                                        data-toggle="tab" href="#departmental-courses" role="tab"
                                        aria-controls="departmental-courses" aria-selected="true">Departmental
                                        Courses</a></li>
                                <li class="nav-item"><a class="nav-link" id="general-courses-tab" data-toggle="tab"
                                        href="#general-courses" role="tab" aria-controls="general-courses"
                                        aria-selected="false">General Courses</a></li>
                                <li class="nav-item"><a class="nav-link" id="unique-courses-tab" data-toggle="tab"
                                        href="#unique-courses" role="tab" aria-controls="unique-courses"
                                        aria-selected="false">Unique Courses</a></li>
                            </ul>
                            <div class="tab-content" id="myTabContent2">
                                <div class="tab-pane fade show active" id="departmental-courses" role="tabpanel"
                                    aria-labelledby="departmental-courses-tab">
                                    <!-- Content for Departmental Courses tab -->

                                    <div class="row">
                                        @php
                                        $availableColors = ['bg-primary', 'bg-success', 'bg-white', 'bg-dark'];
                                        @endphp
                                        @foreach ($lc as $index => $c)
                                        @php
                                        $colorIndex = $index % count($availableColors);
                                        $colorClass = $availableColors[$colorIndex];
                                        @endphp
                                        @if ($c->departmentcourse->department->school->id ==
                                        $student->major->department->school->id)

                                        <div class="col-12 col-sm-6 col-md-6 col-lg-3 col-xl-3">
                                            <div class="card p-2 shadow h-100 ">
                                                <div class="rounded-top overflow-hidden">
                                                    <div class="card-overlay-hover">
                                                        <!-- Image -->
                                                        <img id="backgroundimage"
                                                            src="{{ $c->departmentcourse->course->imgpath}}"
                                                            class="card-img-top" alt="course image"
                                                            style="max-height: 200px;">
                                                    </div>
                                                    <!-- Hover element -->
                                                    <div class="card-img-overlay">
                                                        <div class="d-flex justify-content-end">
                                                            <div class="article-cta">
                                                                <a href="{{ route('studentenrolldept', $c->id)}}"
                                                                    class="btn btn-primary">Enroll</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Card body -->
                                                <div class="card-body {{ $colorClass }}">
                                                    <!-- Title -->
                                                    <h5 id="heading" class="card-ttle"><a href="#"
                                                            class="text-{{ $colorClass == 'bg-white' ? 'dark' : 'light' }}">
                                                            {{$c->departmentcourse->course->course_code}}</a></h5>
                                                    <!-- Badge -->
                                                    <div class="d-flex justify-content-between align-items-center mb-0">
                                                        <a href="#" id="heading" 
                                                            class=" badge bg-purple bg-opacity-{{ $colorClass == 'bg-dark' || $colorClass == 'bg-primary' ? '' : '10' }} text-{{ $colorClass == 'bg-dark' || $colorClass == 'bg-primary' ? 'light' : 'purple' }} me-2"><i
                                                                class="fas fa-graduation-cap small fw-bold"></i>
                                                            {{$c->departmentcourse->course->title}} </a>
                                                    </div>
                                                    <!-- Divider -->
                                                    <hr>
                                                    <div>
                                                        <p class="text-muted">By {{$c->lecturer->name}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        @endif

                                        @endforeach

                                    </div>
                                </div>
                                <div class="tab-pane fade" id="general-courses" role="tabpanel"
                                    aria-labelledby="general-courses-tab">
                                    <!-- Content for General Courses tab -->
                                    <div class="row">
                                        @foreach ($gds as $c)

                                        @if ($c->course->isGEDS==1 && (substr($c->course->course_code, 5, 1) ===
                                        substr($student->level, 0, 1)))

                                        <!-- <div class="col-12 col-sm-6 col-md-6 col-lg-3 col-xl-3">
                                            <article class="article">
                                                <div class="article-header">

                                                    <div class="article-image" id="backgroundimage"
                                                        data-background="{{ $c->course->imgpath }}" url=""></div>

                                                </div>
                                                <div class="article-title">
                                                    <h4 id="heading">{{$c->course->course_code}}</h4>
                                                    <h5 id="heading">By: {{$c->lecturer->name}}</h5>
                                                </div>
                                                <div class="article-details">
                                                    <p>{{$c->course->title}}</p>
                                                    <div class="article-cta">
                                                        <a href="{{ route('studentenrollgeds', $c->id)}}"
                                                            class="btn btn-primary">Enroll</a>
                                                    </div>
                                                </div>
                                            </article>
                                        </div> -->
                                        <div class="col-12 col-sm-6 col-md-6 col-lg-3 col-xl-3">
                                            <div class="card p-2 shadow h-100 ">
                                                <div class="rounded-top overflow-hidden">
                                                    <div class="card-overlay-hover">
                                                        <!-- Image -->
                                                        <img id="backgroundimage"
                                                            src="{{ $c->course->imgpath }}"
                                                            class="card-img-top" alt="course image"
                                                            style="max-height: 200px;">
                                                    </div>
                                                    <!-- Hover element -->
                                                    <div class="card-img-overlay">
                                                        <div class="d-flex justify-content-end">
                                                            <div class="article-cta">
                                                                <a href="{{ route('studentenrolldept', $c->id)}}"
                                                                    class="btn btn-primary">Enroll</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Card body -->
                                                <div class="card-body {{ $colorClass }}">
                                                    <!-- Title -->
                                                    <h5 id="heading" class="card-ttle"><a href="#"
                                                            class="text-{{ $colorClass == 'bg-white' ? 'dark' : 'light' }}">
                                                            {{$c->course->course_code}}</a></h5>
                                                    <!-- Badge -->
                                                    <div class="d-flex justify-content-between align-items-center mb-0">
                                                        <a href="#" id="heading" 
                                                            class=" badge bg-purple bg-opacity-{{ $colorClass == 'bg-dark' || $colorClass == 'bg-primary' ? '' : '10' }} text-{{ $colorClass == 'bg-dark' || $colorClass == 'bg-primary' ? 'light' : 'purple' }} me-2"><i
                                                                class="fas fa-graduation-cap small fw-bold"></i>
                                                                {{$c->course->title}} </a>
                                                    </div>
                                                    <!-- Divider -->
                                                    <hr>
                                                    <div>
                                                        <p class="text-muted">By {{$c->lecturer->name}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        @endif
                                        @endforeach
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="unique-courses" role="tabpanel"
                                    aria-labelledby="unique-courses-tab">
                                    <!-- Content for Unique Courses tab -->
                                    <div class="row">
                                        @foreach ($gds as $c)
                                        @if ($c->course->course_code = null)
                                        <div class="col-12 col-sm-6 col-md-6 col-lg-3 col-xl-3">
                                            <article class="article">
                                                <div class="article-header">

                                                    <div class="article-image" id="backgroundimage"
                                                        data-background="{{ $c->course->imgpath }}" url=""></div>

                                                </div>
                                                <div class="article-title">
                                                    <h4 id="heading">{{$c->course->course_code}}</h4>
                                                    <h5 id="heading">By: {{$c->lecturer->name}}</h5>
                                                </div>
                                                <div class="article-details">
                                                    <p>{{$c->course->title}}</p>
                                                    <div class="article-cta">
                                                        <a href="{{ route('studentenrollunique', $c->id)}}"
                                                            class="btn btn-primary">Enroll</a>
                                                    </div>
                                                </div>
                                            </article>
                                        </div>

                                        @endif
                                        @endforeach
                                    </div>
                                </div>
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