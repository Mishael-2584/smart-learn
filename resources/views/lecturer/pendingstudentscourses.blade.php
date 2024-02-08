@extends('layouts.body')

@section('content')

<div class="main-content">
    <section class="section">
        @include('layouts.error')
        <div class="section-header">
            <h1>My Courses</h1>
        </div>

        <div class="section-body">
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

                                        @foreach ($er as $index => $e)

                                        @php
                                        $colorIndex = $index % count($availableColors);
                                        $colorClass = $availableColors[$colorIndex];
                                        @endphp

                                        @if (isset($e->lecturercourse->departmentcourse) &&
                                        ($e->lecturercourse->lecturer->id == session()->get('id')))
                                        <div class="col-12 col-sm-6 col-md-6 col-lg-3 col-xl-3 mb-4">
                                            <div class="card p-2 shadow h-100">
                                                <div class="card-img-top"
                                                    style="background-image: url('{{ $e->lecturercourse->departmentcourse->course->imgpath }}'); height: 150px; background-size: cover;">
                                                </div>
                                                <div class="card-body {{ $colorClass }}">
                                                    <h5 class="text-{{ $colorClass == 'bg-white' ? 'dark' : 'light' }}">{{
                                                        $e->lecturercourse->departmentcourse->course->course_code }}
                                                    </h5>
                                                    <p class="text-{{ $colorClass == 'bg-white' ? 'dark' : 'light' }}">{{
                                                        $e->lecturercourse->departmentcourse->course->title }}</p>
                                                </div>
                                                <div
                                                    class="card-footer d-flex justify-content-between align-items-center bg-light">
                                                    <span class="badge bg-warning text-dark"
                                                        style="font-weight: bolder">{{
                                                        $pendingStudentsCounts[$e->lecturer_course_id] ?? '0' }}
                                                        Pending</span>
                                                    <a href="{{ route('pendingstudents', $e->lecturercourse->id) }}"
                                                        class="btn btn-primary">Open</a>
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

                                        @foreach ($er as $e)
                                        @if (($e->lecturercourse->lecturer->id == session()->get('id')) &&
                                        (isset($e->lecturercourse->course->isGEDS) == 1))
                                        <div class="col-12 col-sm-6 col-md-6 col-lg-3 col-xl-3">
                                            <article class="article @if ($gc->status == 0) dim @endif">
                                                <div class="article-header">
                                                    <div class="article-image" id="backgroundimage"
                                                        data-background="{{ $e->lecturercourse->course->imgpath }}"
                                                        url=""></div>
                                                </div>
                                                <div class="article-title">
                                                    <h4 id="heading">{{$e->lecturercourse->course->course_code}}</h4>
                                                </div>
                                                <div class="article-details">
                                                    <p>{{$e->lecturercourse->course->title}}</p>
                                                    <div class="article-cta">
                                                        <a href="{{route('pendingstudents', $e->lecturercourse->id)}}"
                                                            class="btn btn-primary">Open</a>
                                                    </div>
                                                </div>

                                            </article>
                                            @endif
                                            @endforeach
                                        </div>
                                    </div>

                                </div>

                                <div class="tab-pane fade" id="unique-courses" role="tabpanel"
                                    aria-labelledby="unique-courses-tab">
                                    <!-- Content for Unique Courses tab -->

                                    <div class="row">

                                        @foreach ($er as $e)
                                        @isset($e->lecturercourse->course->course_code)

                                        @endisset
                                        @if (($e->lecturercourse->lecturer->id == session()->get('id')) &&
                                        isset($e->lecturercourse->course) && $e->lecturercourse->course->course_code ==
                                        null)
                                        <div class="col-12 col-sm-6 col-md-6 col-lg-3 col-xl-3">
                                            <article class="article">
                                                <div class="article-header">
                                                    <div class="article-image" id="backgroundimage"
                                                        data-background="{{ $e->lecturercourse->course->imgpath }}"
                                                        url=""></div>
                                                </div>
                                                <div class="article-title">
                                                    <h5 id="heading">By: {{$e->lecturercourse->lecturer->name}}</h5>
                                                </div>
                                                <div class="article-details">
                                                    <p>{{$e->lecturercourse->course->title}}</p>
                                                    <div class="article-cta">
                                                        <a href="{{route('pendingstudents', $e->lecturercourse->id)}}"
                                                            class="btn btn-primary">Open</a>

                                                    </div>

                                                </div>
                                            </article>
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


        </div>

    </section>
</div>

@endsection

@section('scripts')


<style>
    .popup {
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: rgba(255, 0, 0, 0.8);
        color: #fff;
        padding: 10px;
        border-radius: 5px;
        font-size: 16px;
        z-index: 9999;
    }

    .approval-pending {
        display: flex;
        justify-content: center;
        margin-top: 10px;
    }

    .pending-indicator {
        background-color: red;
        padding: 5px;
        border-radius: 5px;
        color: #fff
    }
</style>

@endsection