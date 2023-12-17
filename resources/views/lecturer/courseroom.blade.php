@extends('layouts.body')


@section('content')

<div class="main-content">
    <div class="section">
        <div class="row">
            <div class="col-12 mb-4 blurry-background">
                <div class="hero-inner blurry-overlay">
                    <!-- Your content goes here -->
                    <h1>{{$lc->departmentcourse->course->course_code}} - {{$lc->departmentcourse->course->title}}</h1>
                    
                    
                </div>

            </div>
            <div class="section-header col-12 col-sm-12" id="meet-link">
                <div class="d-flex justify-content-end align-items-center">
                  <a href="{{route('jitsimeeting', $lc->id)}}" class="btn btn-primary btn-lg btn-icon"><i class="fas fa-sharp fa-regular fa-video"></i> Join Class</a>
                </div>
                
              </div>
        </div>
    </div>
    <div class="section">
            <div class="section-body">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item"><a class="nav-link active" id="stream-tab" data-toggle="tab" href="#stream" role="tab" aria-controls="stream" aria-selected="true">STREAM</a></li>
                                    <li class="nav-item"><a class="nav-link" id="submissions-tab" data-toggle="tab" href="#submissions" role="tab" aria-controls="submissions" aria-selected="false">SUBMISSIONS</a></li>
                                    <li class="nav-item"><a class="nav-link" id="students-tab" data-toggle="tab" href="#students" role="tab" aria-controls="students" aria-selected="false">STUDENTS</a></li>
                                </ul>
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="stream" role="tabpanel" aria-labelledby="stream-tab">
                                        <div class="row">
                                            <div class="col-md-4 col-lg-4">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h4>Upcoming Assignments</h4>
                                                    </div>
                                                    <div class="card-body">
                                                        <table class="table table-striped">
                                                            <thead>
                                                                <tr>
                                                                <th>Assignment</th>
                                                                <th>Due Date</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    
                                                    
                                                </div>
                        
                                            </div>
                                            <div class="col-md-8 col-lg-8">                                            
                                                <div class="card bg-light">
                                                    <div class="card-header">
                                                        <h4>Announce Something to the Class</h4>
                                                    </div>
                                                    <div class="card-body">
                                                       <div class="form-group row mb-4">
                                                           <div class="col-sm-12 col-md-12 col-lg-12">
                                                               <textarea class="summernote"></textarea>
                                                               
                                                           </div>
                                                       </div>
                                                       <div class="form-group row mb-4">
                                                           <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                                           <div class="col-sm-10 col-md-7 col-lg-3 ml-auto ">
                                                               <button type="button" class="btn btn-primary">Post</button>
                                                               <button type="button" class="btn btn-secondary">Cancel</button>
                                                           </div>
                                                       </div>
                                                    </div>
                                                </div>  

                                            </div>
                                        </div>
                                        
                                        
                                        <div class="row">
                                            <div class="col-12 col-lg-8 ml-auto">
                                                <div class="card">

                                                    <div class="card-body bg-light">
                                                        <p>NOTHING HAS BEEN POSTED</p>





                                                    </div>
                                                </div>
                                            </div>
                                                                                                              
                                        </div>
                                    
                                    </div>
                                    <div class="tab-pane fade" id="submissions" role="tabpanel" aria-labelledby="submissions-tab">
                                    


                                    </div>
                                    <div class="tab-pane fade" id="students" role="tabpanel" aria-labelledby="students-tab">
                                    


                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>

                </div>
                
            </div>
            

    </div>

</div>
@endsection


@section('scripts')

<script src="https://kit.fontawesome.com/201e2d289f.js" crossorigin="anonymous"></script>
<script src="{{ asset('codiepie/assets/modules/summernote/summernote-bs4.js') }}"></script>
<script src="{{ asset('codiepie/assets/modules/codemirror/lib/codemirror.js') }}"></script>
<script src="{{ asset('codiepie/assets/modules/codemirror/mode/javascript/javascript.js') }}"></script>
<script src="{{ asset('codiepie/assets/modules/jquery-selectric/jquery.selectric.min.js') }}"></script>

<style>
    #meet-link{
        margin-top: 0;
    }

    .blurry-background {
      position: relative;
    }
  
    .blurry-background::before {
      content: "";
      position: absolute;
      top: 0;
      bottom: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-image: url({{ $lc->departmentcourse->course->imgpath }});
      background-size: cover;
      background-position: center;
      opacity: 0.5; /* Adjust the opacity value to your desired level */
      z-index: -1;
      border: 2px solid black;
      height: 100px;
    }
  
    .blurry-overlay {
      position: relative;
      z-index: 1;
    }
  </style>
    
@endsection