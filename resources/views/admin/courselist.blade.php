@extends('layouts.body')

@section('content')

<!-- Start app main Content -->
<div class="main-content">
    <section class="section">
        @include('layouts.error')
        <div class="section-body">
            <h2 class="section-title">Add a new course</h2>
            <p class="section-lead">Fill the form to add a new course</p>

            <div class="row">
                <div class="col-12 col-sm-12 col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <ul class="nav nav-pills" id="myTab3" role="tablist">
                                <li class="nav-item"><a class="nav-link active" id="departmental-courses-tab" data-toggle="tab" href="#departmental-courses" role="tab" aria-controls="departmental-courses" aria-selected="true">Departmental Courses</a></li>
                                <li class="nav-item"><a class="nav-link" id="general-courses-tab" data-toggle="tab" href="#general-courses" role="tab" aria-controls="general-courses" aria-selected="false">General Courses</a></li> 
                                <li class="nav-item"><a class="nav-link" id="unique-courses-tab" data-toggle="tab" href="#unique-courses" role="tab" aria-controls="unique-courses" aria-selected="false">Unique Courses</a></li>
                            </ul>
                            <br>
                            <div class="tab-content" id="myTabContent2">
                                <div class="tab-pane fade show active" id="departmental-courses" role="tabpanel" aria-labelledby="departmental-courses-tab">
                                    <!-- Content for Departmental Courses tab -->

                                    <div class="row">
                                        @foreach ($coursedeps as $c)
                                          <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                                            <article class="article">
                                                <div class="article-header">
                                                    
                                                    <div class="article-image" id="backgroundimage" data-background="{{ $c->course->imgpath }}" url=""></div>
                                                    
                                                </div>
                                                <div class="article-title">
                                                    <h4 id="heading">{{$c->course->course_code}}</h4>
                                                </div>
                                                <div class="article-details">
                                                    <p>{{$c->course->title}}</p>
                                                    <div class="article-cta">
                                                        <a href="#" class="btn btn-primary">Read More</a>
                                                    </div>
                                                </div>
                                            </article>
                                        </div>  
                                        @endforeach
                                        
                                    </div>
                                    
                                    
                                    
                                            
                                        
                                </div>
                                <div class="tab-pane fade" id="general-courses" role="tabpanel" aria-labelledby="general-courses-tab">
                                    <!-- Content for General Courses tab -->
                                    

                                    
                                        <div class="row">
                                            @foreach ($courses as $course)
                                            @if ($course->isGEDS==1)
                                              <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                                                <article class="article">
                                                    <div class="article-header">
                                                        
                                                        <div class="article-image" id="backgroundimage" data-background="{{ $course->imgpath }}" url=""></div>
                                                        
                                                    </div>
                                                    <div class="article-title">
                                                        <h4 id="heading">{{$course->course_code}}</h4>
                                                    </div>
                                                    <div class="article-details">
                                                        <p>{{$course->title}}</p>
                                                        <div class="article-cta">
                                                            <a href="#" class="btn btn-primary">Read More</a>
                                                        </div>
                                                    </div>
                                                </article>
                                            </div>

                                        </div>   
                                        @endif
                                        @endforeach
                                   
                                    
                                    
                               
                                </div>
                                <div class="tab-pane fade" id="unique-courses" role="tabpanel" aria-labelledby="unique-courses-tab">
                                    <!-- Content for Unique Courses tab -->

                                    <div class="row">
                                        @foreach ($courses as $course)
                                        @if ($course->isGEDS==0 && $course->course_code==null)
                                          <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                                            <article class="article">
                                                <div class="article-header">
                                                    
                                                    <div class="article-image" id="backgroundimage" data-background="{{ $course->imgpath }}" url=""></div>
                                                    
                                                </div>
                                                <div class="article-title">
                                                    <h4 id="heading">{{$course->course_code}}</h4>
                                                </div>
                                                <div class="article-details">
                                                    <p>{{$course->title}}</p>
                                                    <div class="article-cta">
                                                        <a href="#" class="btn btn-primary">Read More</a>
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
<script>
    $(document).ready(function () {
        $('#school').change(function () {
            var schoolId = $(this).val();
            // Send an AJAX request to fetch departments based on the selected school
            $.ajax({
                url: '{{ route("schoollookup", ["schoolId" => ":schoolId"]) }}'.replace(':schoolId', schoolId), // Update the URL
                type: 'GET',
                success: function (data) {
                    var options = '<option value="">Select a department</option>';
                    data.forEach(function (department) {
                        options += '<option value="' + department.id + '">' + department.name + '</option>';
                    });
                    $('#department').html(options);
                }
            });
        });
    });
</script>



@endsection