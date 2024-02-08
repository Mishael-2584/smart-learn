@extends('layouts.body')

@section('content')

<div class="main-content">
    <section class="section">
        @include('layouts.error')
        <div class="section-header">
            <h1>My Classes</h1>
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
                                        @if (isset($e->lecturercourse->departmentcourse))

                                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
                                            <div class="card p-2 shadow h-100 {{ $e->status == 1 ? 'dim' : '' }}">
                                                <div class="rounded-top overflow-hidden">
                                                    <!-- Image -->
                                                    <img id="backgroundimage"
                                                         src="{{ $e->lecturercourse->departmentcourse->course->imgpath }}"
                                                         class="card-img-top" alt="course image"
                                                         style="max-height: 200px;">
                                                    <!-- Hover element -->
                                                    <div class="card-img-overlay">
                                                        <div class="d-flex justify-content-end">
                                                            <div class="article-cta">
                                                                @if ($e->status != 1)
                                                                    <a href="{{route('studentopencourse', $e->id)}}"
                                                                       class="btn btn-primary">Open</a>
                                                                @else
                                                                    <button class="btn btn-primary"
                                                                            onclick="displayErrorMessage(this)">Open</button>
                                                                    <div class="approval-pending">
                                                                        <span class="pending-indicator">Pending Approval</span>
                                                                    </div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Card body -->
                                                <div class="card-body {{ $colorClass }}">
                                                    <!-- Title -->
                                                    <h5 id="heading" class="card-title">
                                                        <a href="#"
                                                           class="text-{{ $colorClass == 'bg-white' ? 'dark' : 'light' }}">
                                                            {{$e->lecturercourse->departmentcourse->course->course_code}}
                                                        </a>
                                                    </h5>
                                                    <!-- Badge -->
                                                    <div class="d-flex justify-content-between align-items-center mb-0">
                                                        <a href="#" id="heading"
                                                           class="badge bg-purple bg-opacity-{{ $colorClass == 'bg-dark' || $colorClass == 'bg-primary' ? '' : '10' }} text-{{ $colorClass == 'bg-dark' || $colorClass == 'bg-primary' ? 'light' : 'purple' }}">
                                                            <i class="fas fa-graduation-cap small fw-bold"></i>
                                                            {{$e->lecturercourse->departmentcourse->course->title}}
                                                            
                                                        </a>
                                                    </div>
                                                    <!-- Divider -->
                                                    <hr>

                                                    <P class="text-{{ $colorClass == 'bg-white' ? 'dark' : 'light' }} "> BY: {{$e->lecturercourse->lecturer->name}}</P>
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
                                        @if (isset($e->lecturercourse->course) && $e->lecturercourse->course->isGEDS ==
                                        1)


                                        <div class="col-12 col-sm-6 col-md-6 col-lg-3 col-xl-3">
                                            <article class="article @if ($e->status == 1) dim @endif">
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
                                                        @if ($e->status != 1)
                                                        <a href="" class="btn btn-primary">Open</a>
                                                        @else
                                                        <button class="btn btn-primary"
                                                            onclick="displayErrorMessage(this)">Open </button>
                                                        <div class="approval-pending">
                                                            <span class="pending-indicator">Pending Approval</span>
                                                        </div>

                                                        @endif
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
                                        @if (isset($e->lecturercourse->course) && $e->lecturercourse->course->isGEDS ==
                                        0)


                                        <div class="col-12 col-sm-6 col-md-6 col-lg-3 col-xl-3">
                                            <article class="article @if ($e->status == 1) dim @endif">
                                                <div class="article-header">
                                                    <div class="article-image" id="backgroundimage"
                                                        data-background="{{ $e->lecturercourse->course->imgpath }}"
                                                        url=""></div>
                                                </div>
                                                <div class="article-title">
                                                    <h5 id="heading">By: {{$e->lecturercourse->course->lecturer->name}}
                                                    </h5>
                                                    <h4 id="heading">{{$uc->course->course_code}}</h4>
                                                </div>
                                                <div class="article-details">
                                                    <p>{{$gc->course->title}}</p>
                                                    <div class="article-cta">
                                                        @if ($uc->status != 1)
                                                        <a href="" class="btn btn-primary">Open</a>
                                                        @else
                                                        <button class="btn btn-primary"
                                                            onclick="displayErrorMessage(this)">Open </button>
                                                        <div class="approval-pending">
                                                            <span class="pending-indicator">Pending Approval</span>
                                                        </div>

                                                        @endif
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
<script>
    function createPopup(message) {
        var popup = document.createElement("div");
        popup.classList.add("popup");
        popup.textContent = message;
        document.body.appendChild(popup);
        setTimeout(function () {
            popup.style.display = "none";
            popup.remove();
        }, 1000);
    }

    function displayErrorMessage(button) {
        var errorMessage = "Pending lecturer approval";
        createPopup(errorMessage);
    }
</script>

<style>
    .badge {
      white-space: normal;
      display: inline-block; /* or block, depending on your layout */
      padding: .5em; /* or however much padding you want */
    }

    .popup {
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: orange;
        color: #fff;
        padding: 10px;
        font-size: 16px;
        z-index: 9999;
    }

    .approval-pending {
        display: flex;
        justify-content: center;
        margin-top: 10px;
    }

    .pending-indicator {
        background-color: orange;
        padding: 5px;
        color: #fff
    }
</style>

@endsection