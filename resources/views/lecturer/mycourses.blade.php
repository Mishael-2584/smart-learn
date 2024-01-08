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
                                <li class="nav-item"><a class="nav-link active" id="departmental-courses-tab" data-toggle="tab" href="#departmental-courses" role="tab" aria-controls="departmental-courses" aria-selected="true">Departmental Courses</a></li>
                                <li class="nav-item"><a class="nav-link" id="general-courses-tab" data-toggle="tab" href="#general-courses" role="tab" aria-controls="general-courses" aria-selected="false">General Courses</a></li> 
                                <li class="nav-item"><a class="nav-link" id="unique-courses-tab" data-toggle="tab" href="#unique-courses" role="tab" aria-controls="unique-courses" aria-selected="false">Unique Courses</a></li>
                            </ul>
                            <div class="tab-content" id="myTabContent2">
                                <div class="tab-pane fade show active" id="departmental-courses" role="tabpanel" aria-labelledby="departmental-courses-tab">
                                    <!-- Content for Departmental Courses tab -->
                                    <div class="row">
                                        @foreach ($lcs as $lc)
                                        <div class="col-12 col-sm-6 col-md-6 col-lg-3 col-xl-3">
                                            <article class="article @if ($lc->status == 0) dim @endif">
                                                <div class="article-header">
                                                    <div class="article-image" id="backgroundimage" data-background="{{ $lc->departmentcourse->course->imgpath }}" url=""></div>
                                                </div>
                                                <div class="article-title">
                                                    <h4 id="heading">{{$lc->departmentcourse->course->course_code}}</h4>
                                                </div>
                                                <div class="article-details">
                                                    <p>{{$lc->departmentcourse->course->title}}</p>
                                                    <div class="article-cta">
                                                        @if ($lc->status != 0)
                                                            <a href="{{route('lectureropencourse', $lc->id)}}" class="btn btn-primary">Open</a>
                                                        @else
                                                            <button class="btn btn-primary" onclick="displayErrorMessage(this)">Open </button>
                                                            <div class="approval-pending">
                                                                <span class="pending-indicator">Pending Approval</span>
                                                            </div>

                                                        @endif       
                                                    </div>
                                                        
                                                
                                                </div>
                                                
                                            </article>
                                        @endforeach
                                        </div>  
                                    </div> 
                                
                                        
                                </div>
                                    
                            
                                
                                <div class="tab-pane fade" id="general-courses" role="tabpanel" aria-labelledby="general-courses-tab">
                                        <!-- Content for General Courses tab -->

                                        <div class="row">

                                            @foreach ($gcs as $gc)
                                            @if (isset($gc->course->course_code))


                                            <div class="col-12 col-sm-6 col-md-6 col-lg-3 col-xl-3">
                                                <article class="article @if ($gc->status == 0) dim @endif">
                                                    <div class="article-header">
                                                        <div class="article-image" id="backgroundimage" data-background="{{ $gc->course->imgpath }}" url=""></div>
                                                    </div>
                                                    <div class="article-title">
                                                        <h4 id="heading">{{$gc->course->course_code}}</h4>
                                                    </div>
                                                    <div class="article-details">
                                                        <p>{{$gc->course->title}}</p>
                                                        <div class="article-cta">
                                                            @if ($gc->status != 0)
                                                                <a href="#" class="btn btn-primary">Open</a>
                                                            @else
                                                                <button class="btn btn-primary" onclick="displayErrorMessage(this)">Open </button>
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

                                <div class="tab-pane fade" id="unique-courses" role="tabpanel" aria-labelledby="unique-courses-tab">
                                        <!-- Content for Unique Courses tab -->

                                        <div class="row">

                                            @foreach ($gcs as $uc)
                                            @if (isset($uc->course->course_code) == null)


                                            <div class="col-12 col-sm-6 col-md-6 col-lg-3 col-xl-3">
                                                <article class="article @if ($uc->status == 0) dim @endif">
                                                    <div class="article-header">
                                                        <div class="article-image" id="backgroundimage" data-background="{{ $uc->course->imgpath }}" url=""></div>
                                                    </div>
                                                    <div class="article-title">
                                                        {{-- <h4 id="heading">{{$uc->course->course_code}}</h4> --}}
                                                    </div>
                                                    <div class="article-details">
                                                        <p>{{$gc->course->title}}</p>
                                                        <div class="article-cta">
                                                            @if ($uc->status != 0)
                                                                <a href="#" class="btn btn-primary">Open</a>
                                                            @else
                                                                <button class="btn btn-primary" onclick="displayErrorMessage(this)">Open </button>
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
        setTimeout(function() {
            popup.style.display = "none";
            popup.remove();
        }, 1000);
    }

    function displayErrorMessage(button) {
        var errorMessage = "Course pending approval";
        createPopup(errorMessage);
    }
</script>

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