@extends('layouts.body')

@section('content')
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
                            <div class="tab-content" id="myTabContent2">
                                <div class="tab-pane fade show active" id="departmental-courses" role="tabpanel" aria-labelledby="departmental-courses-tab">
                                    <!-- Content for Departmental Courses tab -->
                                    
                                            <div class="row">
                                                <div class="col-12 col-md-6 col-lg-6">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <br>
                                                            <form action="{{ route('postcourse') }}?imgpath=" method="POST">
                                                                @csrf
                                                                <div class="form-group">
                                                                    <div class="section-title">Fill the form below</div>
                                                                    <div class="form-group">
                                                                        <label>Select School</label>
                                                                        <!-- Add the dropdown select element for schools -->
                                                                        <select id="school" class="form-control select2">
                                                                            <option value="">Select a school</option>
                                                                            @foreach ($schools as $school)
                                                                                <option value="{{ $school->id }}">{{ $school->name }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Select Department</label>
                                                                        <!-- Add the dropdown select element for departments -->
                                                                        <select id="department" name="department" class="form-control select2">
                                                                            <option value="">Select a department</option>
                                                                            @isset($departments)
                                                                                @foreach ($departments as $department)
                                                                                <option value="{{ $department->id }}">{{ $department->name }}</option>
                                                                                @endforeach
                                                                            @endisset

                                                                        </select>
                                                                    </div>
                                                                
                                                                    <div class="form-group">
                                                                        <label>Course Code</label>
                                                                        <input type="text" name="code" class="form-control" required>
                                                                    </div>
                                                                
                                                                    <div class="form-group">
                                                                        <label>Course Title</label>
                                                                        <input type="text" id="course-title" name="title" class="form-control" required>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <input type="hidden" id="imgpath" name="imgpath">
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label>Course Description</label>
                                                                        <textarea name="description" class="form-control" id="description" cols="30" rows="10"></textarea>
                                                                    </div>
                                                                    <div class="card-footer text-right">
                                                                        <button class="btn btn-primary">Submit</button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        
                                </div>
                                <div class="tab-pane fade" id="general-courses" role="tabpanel" aria-labelledby="general-courses-tab">
                                    <!-- Content for General Courses tab -->
                                <div class="row"> 
                                    <div class="col-12 col-md-6 col-lg-6">
                                        <div class="card">
                                            <div class="card-body">
                                                <br>
                                                <form action="#" method="POST">
                                                    @csrf
                                                    <div class="form-group">
                                                        <div class="section-title">Fill the form below</div>
                                                        <div class="form-group">
                                                            <label>Course Code</label>
                                                            <input type="text" name="code" class="form-control" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Course Title</label>
                                                            <input type="text" id="course-title2" name="title" class="form-control" required>
                                                        </div>

                                                        <div class="form-group">
                                                            <input type="hidden" id="imgpath2" name="imgpath">
                                                        </div>
                                                        
                                                        <div class="form-group">
                                                            <label>Course Description</label>
                                                            <textarea name="description" class="form-control" id="description2" cols="30" rows="10"></textarea>
                                                        </div>
                                                        <div class="card-footer text-right">
                                                            <button class="btn btn-primary">Submit</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </div>
                                <div class="tab-pane fade" id="unique-courses" role="tabpanel" aria-labelledby="unique-courses-tab">
                                    <!-- Content for Unique Courses tab -->
                                    <div class="row"> 
                                        <div class="col-12 col-md-6 col-lg-6">
                                            <div class="card">
                                                <div class="card-body">
                                                    <br>
                                                    <form action="#" method="POST">
                                                        @csrf
                                                        <div class="form-group">
                                                            <div class="section-title">Fill the form below</div>
                                                            <div class="form-group">
                                                                <label>Course Title</label>
                                                                <input type="text" id="course-title3" name="title" class="form-control" required>
                                                            </div>

                                                            <div class="form-group">
                                                                <input type="hidden" id="imgpath3" name="imgpath">
                                                            </div>

                                                            <div class="form-group">
                                                                <label>Course Description</label>
                                                                <textarea name="description" class="form-control" id="description3" cols="30" rows="10" required></textarea>
                                                            </div>
                                                            <div class="card-footer text-right">
                                                                <button class="btn btn-primary">Submit</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
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
    
@endsection