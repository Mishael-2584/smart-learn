@extends('layouts.body')

@section('content')

<!-- Start app main Content -->
<div class="main-content">

    <section class="section">
        @include('layouts.error')
        <div class="section-header">
            <h1>Enroll For GEDS Course</h1>
        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('submitstudentenrollgeds', $lc->departmentcourse->id) }}" method="POST">
                                @csrf     
                                <div class="form-group">
                                    <label for="coursecode">Course Code:</label>
                                    <input type="text" name="coursecode" id="coursecode" value="{{$lc->departmentcourse->course->course_code}}" class="form-control" disabled>
                                </div>
                                
                                <div class="form-group">
                                    <label for="title">Course Title:</label>
                                    <input type="text" name="title" id="title" value="{{$lc->departmentcourse->course->title}}" class="form-control" disabled>
                                </div>

                                <div class="form-group">
                                    <label for="lecturer">Lecturer:</label>
                                    <input type="text" name="lecturer" id="lecturer" value="{{$lc->lecturer->name}}" class="form-control" disabled">

                                </div>

                                <div class="form-group">
                                    <label for="description"> Course Description:</label>
                                    <input type="text" name="description" id="description" value="{{$lc->departmentcourse->course->description}}" class="form-control" disabled>
                                </div>
                            
                                <div class="form-group">
                                    <label for="day">Day:</label>
                                    <select name="day" id="day" class="form-control" value="{{$lc->day}}" disabled>
                                        <option value="Sunday">Sunday</option>
                                        <option value="Monday">Monday</option>
                                        <option value="Tuesday">Tuesday</option>
                                        <option value="Wednesday">Wednesday</option>
                                        <option value="Thursday">Thursday</option>
                                        <option value="Friday">Friday</option>
                                        <option value="Saturday">Saturday</option>
                                    </select>
                                </div>
                            
                                <div class="form-group">
                                    <label for="start_time">Start Time:</label>
                                    <input type="text" name="start-time" id="" class="form-control timepicker" value="{{$lc->start_time}}" disabled>
                                </div>
                                
                                <div class="form-group">
                                    <label for="end_time">End Time:</label>
                                    <input type="text" name="end-time" id="" class="form-control timepicker" value="{{$lc->end_time}}" disabled>
                                </div>

                                <div class="form-group">
                                    <label for="id"></label>
                                    <input type="text" name="id" id="id" value="{{$lc->id}}" class="form-control" hidden>

                                </div>
                        
                            
                                <button type="submit" class="btn btn-primary">Enroll</button>
                            </form>

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