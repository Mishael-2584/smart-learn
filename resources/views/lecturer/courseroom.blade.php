@extends('layouts.body')


@section('content')

<div class="main-content">
    <div class="section">
        @include('layouts.error')
        <div class="row">
            <div class="col-12 mb-4 ">
                <img id="backgroundimage" src="{{ $lc->departmentcourse->course->imgpath }}" alt="" class="banner-img">
                <div class="hero-inner">
                    <!-- Your content goes here -->
                    <h1>{{$lc->departmentcourse->course->course_code}} - {{$lc->departmentcourse->course->title}}</h1>
                </div>
                <div class=" col-12 col-sm-12" id="meet-link">
                    <div class="d-flex justify-content-end align-items-center">
                        <a href="{{route('jitsimeeting', $lc->id)}}"
                            class="btn btn-primary btn-lg btn-icon action-button"><i
                                class="fas fa-sharp fa-regular fa-video"></i> Join Class</a>
                    </div>

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
                                    <li class="nav-item"><a class="nav-link" id="submissions-tab" data-toggle="tab" href="#submissions" role="tab" aria-controls="submissions" aria-selected="false">COURSEWORK</a></li>
                                    <li class="nav-item"><a class="nav-link" id="classwork-tab" data-toggle="tab"
                                        href="#classwork" role="tab" aria-controls="classwork"
                                        aria-selected="false">CLASS WORK</a></li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="students-tab" data-toggle="tab" href="#students" role="tab" aria-controls="students" aria-selected="false">
                                            STUDENTS
                                            <span class="badge bg-primary text-white">{{ count($er) }}</span>
                                        </a>
                                    </li>
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
                                            <div class="card custom-rounded-border bg-light">
                                                <div class="card-header">
                                                    <h4>Announce Something to the Class</h4>
                                                </div>
                                                <div class="card-body">
                                                    <form action="{{ route('lecturerpost', $lc->id) }}" method="POST">
                                                        @csrf
                                                        <div class="form-group row mb-4">
                                                            <div class="col-sm-12 col-md-12 col-lg-12">
                                                                <textarea class="summernote" name="content"></textarea>

                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class="form-group row mb-4">
                                                            <label
                                                                class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                                            <div class="col-sm-10 col-md-7 col-lg-3 ml-auto ">
                                                                <button type="submit"
                                                                    class="btn btn-primary">Post</button>
                                                                <button type="button"
                                                                    class="btn btn-secondary">Cancel</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>

                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-12 col-lg-8 ml-auto">
                                            @isset($po)


                                            @foreach ($po as $p)
                                            <div class="card custom-rounded-border bg-light">


                                                @if ($p->student)
                                                <div class="card-body custom-rounded-border">
                                                    <div id="info-section-{{$p->id}}" class="section">
                                                        <div class="section-head bg-light"
                                                            style="display: flex; justify-content: space-between; align-items: center;">
                                                            <div style="display: flex; align-items: center;">
                                                                <div class="circle">{{ $p->student->initials }}</div>
                                                                <div style="margin-left: 8px;">
                                                                    <strong>{{ $p->student->name }}</strong>
                                                                    <br>
                                                                    <small>{{ $p->updated_at }}</small>
                                                                </div>
                                                            </div>
                                                            <div class="dropdown"
                                                                style="padding: 4px; border-radius: 4px;">
                                                                <div class="dropdown" data-toggle="dropdown">
                                                                    <i class="fa-sharp fa-solid fa-ellipsis-vertical rounded"
                                                                        style="padding: 4px; border-radius: 4px; border: 1px solid #ccc;"></i>
                                                                </div>
                                                                <div class="dropdown-menu dropdown-menu-right"
                                                                    id="dropdown-menu-{{$p->id}}">
                                                                    <a href="#" class="dropdown-item has-icon"
                                                                        id="edit-item-{{$p->id}}"
                                                                        onclick="openEditor(event, <?php echo htmlspecialchars(json_encode($p->content)); ?>, '<?php echo $p->id; ?>'); return false;">
                                                                        <i class="fa-solid fa-pen-to-square"></i> Edit
                                                                    </a>
                                                                    <a class="dropdown-item delete-post"
                                                                        id="delete-item-{{$p->id}}" href="#"><i
                                                                            class="fas fa-trash"></i> Delete</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class="section-body" id="section-body-{{$p->id}}">
                                                            {!! $p->content !!}
                                                        </div>
                                                    </div>
                                                    <form id="editor-form-{{$p->id}}"
                                                        action="{{ route('lecturerpostedit', $p->id) }}" method="post">
                                                        @csrf
                                                        <input id="editor-content-{{$p->id}}" type="hidden"
                                                            name="editcontent" id="editor-content-{{$p->id}}">
                                                        <div id="summernote-{{$p->id}}" class="form-group row mb-4"
                                                            style="display: none;">
                                                            <div class="col-sm-12 col-md-12 col-lg-12">
                                                                <input type="hidden" name="content"
                                                                    id="editor-content-{{$p->id}}">
                                                                <!-- Ensure the ID here is unique and different from the DIV's ID -->

                                                            </div>
                                                        </div>
                                                        <button type="submit" id="save-button-{{$p->id}}"
                                                            class="btn btn-success edit-buttons">Save Changes</button>
                                                        <button type="button" id="close-button-{{$p->id}}"
                                                            class="btn btn-secondary edit-buttons">Close</button>
                                                    </form>
                                                    <br>
                                                    <a href="#commentsModal" data-toggle="modal"
                                                        data-post-id="{{$p->id}}" data-target=".comments-modal">View
                                                        Comments ({{ $p->comments->count() ?? '0' }})</a>

                                                    <!-- Modal for comments -->





                                                </div>

                                                @else




                                                <div class="card-body" id="post-{{$p->id}}">
                                                    <div id="info-section-{{$p->id}}" class="section">
                                                        <div class="section-head bg-light"
                                                            style="display: flex; justify-content: space-between; align-items: center;">
                                                            <div style="display: flex; align-items: center;">
                                                                <div class="circle">{{ $p->lecturer->initials }}</div>
                                                                <div style="margin-left: 8px;">
                                                                    <strong>{{ $p->lecturer->name }}</strong>
                                                                    <span class="badge badge-success rounded-circle p-0"
                                                                        style="background-color: transparent;"
                                                                        title="Verified">
                                                                        <i class="fa-solid fa-circle-check fa-lg"
                                                                            style="color: #4c68d7;"></i>
                                                                    </span>
                                                                    <br>
                                                                    <small>{{ $p->updated_at }}</small>
                                                                </div>
                                                            </div>
                                                            <div class="dropdown"
                                                                style="padding: 4px; border-radius: 4px;">
                                                                <div class="dropdown" data-toggle="dropdown">
                                                                    <i class="fa-sharp fa-solid fa-ellipsis-vertical rounded"
                                                                        style="padding: 4px; border-radius: 4px; border: 1px solid #ccc;"></i>
                                                                </div>
                                                                <div class="dropdown-menu dropdown-menu-right"
                                                                    id="dropdown-menu-{{$p->id}}">
                                                                    <a href="#" class="dropdown-item has-icon"
                                                                        id="edit-item-{{$p->id}}"
                                                                        onclick="openEditor(event, <?php echo htmlspecialchars(json_encode($p->content)); ?>, '<?php echo $p->id; ?>'); return false;">
                                                                        <i class="fa-solid fa-pen-to-square"></i> Edit
                                                                    </a>
                                                                    <a class="dropdown-item delete-post"
                                                                        id="delete-item-{{$p->id}}" href="#"><i
                                                                            class="fas fa-trash"></i> Delete</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class="section-body" id="section-body-{{$p->id}}">
                                                            {!! $p->content !!}
                                                        </div>
                                                    </div>
                                                    <form id="editor-form-{{$p->id}}"
                                                        action="{{ route('lecturerpostedit', $p->id) }}" method="post">
                                                        @csrf
                                                        <input id="editor-content-{{$p->id}}" type="hidden"
                                                            name="editcontent" id="editor-content-{{$p->id}}">
                                                        <div id="summernote-{{$p->id}}" class="form-group row mb-4"
                                                            style="display: none;">
                                                            <div class="col-sm-12 col-md-12 col-lg-12">
                                                                <input type="hidden" name="content"
                                                                    id="editor-content-{{$p->id}}">
                                                                <!-- Ensure the ID here is unique and different from the DIV's ID -->

                                                            </div>
                                                        </div>
                                                        <button type="submit" id="save-button-{{$p->id}}"
                                                            class="btn btn-success edit-buttons">Save Changes</button>
                                                        <button type="button" id="close-button-{{$p->id}}"
                                                            class="btn btn-secondary edit-buttons">Close</button>
                                                    </form>
                                                    <br>
                                                    <a href="#commentsModal" data-toggle="modal"
                                                        data-post-id="{{$p->id}}" data-target=".comments-modal">View
                                                        Comments ({{ $p->comments->count() ?? '0' }})</a>

                                                    <!-- Modal for comments -->

                                                </div>

                                                @endif
                                            </div>


                                            @endforeach
                                            @endisset


                                                
                                            </div>
                                                    
                                                                                                              
                                        </div>
                                    
                                    </div>

                                          
                                    <div class="tab-pane fade" id="submissions" role="tabpanel" aria-labelledby="submissions-tab">
                                        <div class="row">
                                            <div class="col-12 col-sm-7 col-lg-12">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-3 col-sm-12 col-md-4 col-lg-2">
                                                                <ul class="nav nav-pills flex-column" id="myTab4" role="tablist">
                                                                    <li class="nav-item"><a class="nav-link active" id="quizzes-lecturer" data-toggle="tab" href="#quizzes" role="tab" aria-controls="home" aria-selected="true">QUIZZES</a></li>
                                                                    <li class="nav-item"><a class="nav-link" id="assignments-lecturer" data-toggle="tab" href="#assignments" role="tab" aria-controls="profile" aria-selected="false">ASSIGNMENTS</a></li>
                                                                </ul>
                                                            </div>
                                                            <div class="col-9 col-sm-12 col-md-8 col-lg-10">
                                                            <div class="tab-content no-padding" id="myTab2Content">
                                                                <div class="tab-pane fade show active" id="quizzes" role="tabpanel" aria-labelledby="quizzes-lecturer">
                                                                    <div class="card">
                                                                            <div class="card-header">
                                                                                <h4>{{$lc->departmentcourse->course->course_code}} - Quiz List</h4>
                                                                            </div>
                                                                            <div class="card-body">
                                                                                <div class="table-responsive">
                                                                                    <table class="table table-bordered table-md v_center">
                                                                                        <tr>
                                                                                            <th>#</th>
                                                                                            <th>Quiz Title</th>
                                                                                            <th>Created On</th>
                                                                                            <th>Duration</th>
                                                                                            <th>Start Date & Time</th>
                                                                                            <th>Total Qns</th>
                                                                                            <th>Action</th>
                                                                                        </tr>
                                                                                        @isset($qz)                    
                                                                                        @foreach ($qz as $index => $q)
                                                                                        @php
                                                                                            // Create a Carbon instance from the deadline
                                                                                            $deadline = \Carbon\Carbon::parse($q->deadline);
                                                                                                                                                                            
                                                                                            // Subtract the time limit in minutes to get the start time
                                                                                            $startTime = $deadline->copy()->subMinutes($q->time_limit);
                                                                                        @endphp
                                                                                        <tr>
                                                                                            <td>{{ $index+1 }}</td>
                                                                                            <td>{{ $q->title }}</td>
                                                                                            <td>{{ $q->updated_at }}</td>
                                                                                            <td>{{ $q->time_limit }} mins</td>
                                                                                            <td>{{ $startTime->format('d/m/Y g:i A') }}</td>
                                                                                            <td><div class="badge badge-success">{{ $q->questions->count() }}</div></td>
                                                                                            <td><a href="{{route('lecturerquizdetail', $q->id)}}" class="btn btn-secondary">View</a></td>
                                                                                        </tr>       
                                                                                        @endforeach     
                                                                                        @endisset
                                                                                        
                                                                                
                                                                                    </table>
                                                                                </div>
                                                                            </div>
                                                                            <div class="card-footer text-right">
                                                                                <nav class="d-inline-block">            
                                                                                    <ul class="pagination mb-0">
                                                                                        <!-- Button trigger modal -->
                                                                                        <li id="add-quiz-btn" class="btn btn-success" data-toggle="modal" data-target="#addQuizModal"><i class="fas fa-plus"></i> New Quiz</li>

                                                                                        <li class="page-item disabled"><a class="page-link" href="#" tabindex="-1"><i class="fas fa-chevron-left"></i></a></li>
                                                                                        <li class="page-item active"><a class="page-link" href="#">1 <span class="sr-only">(current)</span></a></li>
                                                                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                                                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                                                                        <li class="page-item"><a class="page-link" href="#"><i class="fas fa-chevron-right"></i></a></li>
                                                                                    </ul>
                                                                                </nav>
                                                                            </div>
                                                                        </div>
                                                                </div>
                                                                <div class="tab-pane fade" id="assignments" role="tabpanel" aria-labelledby="assignments-lecturer">

                                                                    
                                                                
                                                                </div>
                                                                
                                                            </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Class work tab start -->
                                    <div class="tab-pane fade" id="classwork" role="tabpanel"
                                        aria-labelledby="classwork-tab">

                                        <div class="container">
                                            <div class="row justify-content-center">
                                                <div class="col-md-6">
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-primary create-btn"
                                                            data-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">
                                                            <i class="fas fa-plus"></i> Create
                                                        </button>
                                                        <div class="dropdown-menu pt-4">
                                                            <a class="dropdown-item "
                                                                href="#"><i
                                                                    class="fas fa-clipboard text-primary"></i> <span
                                                                    class="ml-4">Assignment</span></a>
                                                            <a class="dropdown-item" href="#"><i
                                                                    class="fas fa-question-circle text-primary"></i> <span
                                                                    class="ml-4">Quiz</span></a>
                                                            <a class="dropdown-item" href="#"><i
                                                                    class="fas fa-question text-primary"></i> <span
                                                                    class="ml-4">Question</span></a>
                                                            <a class="dropdown-item" href="#"><i
                                                                    class="fas fa-file-alt text-primary"></i> <span
                                                                    class="ml-4">Learning Material</span></a>
                                                            <div class="dropdown-divider"></div>
                                                            <a class="dropdown-item" href="#"><i
                                                                    class="fas fa-lightbulb text-primary"></i> <span
                                                                    class="ml-4">Topic</span></a>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="text-center">
                                                        <img src="{{ asset('codiepie/assets/img/bg/bg1.jpg') }}"
                                                            alt="Vector Image" class="img-fluid">
                                                    </div>
                                                    <p class="text-center ">
                                                        Welcome to the class workspace! This is where you can create and
                                                        manage various assignments, quizzes, and learning materials.
                                                        Use the <strong>Create</strong> button to start crafting engaging
                                                        content. Feel free to attach documents, images, or any resources
                                                        that enhance the learning experience for everyone.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="tab-pane fade" id="students" role="tabpanel" aria-labelledby="students-tab">

                                        <div class="table-responsive">
                                            <table class="table table-striped v_center" id="table-1">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Matric Number</th>
                                                        <th>Students Name</th>
                                                        <th>Group</th>
                                                        <th>Level</th>
                                                        <th>Email</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @isset($er)
                                                    
                                                    @foreach ($er as $index => $e)
                                                    
                                                    <tr>
                                                        
                                                            
                                                        <td>{{$index+1}}</td>
                                                        <td>{{$e->student->matric_no}}</td>
                                                        <td>{{$e->student->name}}</td>
                                                        <td>{{$e->student->group}}</td>
                                                        <td>{{$e->student->level}}</td>
                                                        <td>{{$e->student->email}}</td>

                                                        
                                                        <td>
                                                            <a href="#" data-toggle="dropdown" class="dropdown btn">
                                                                <i class="fa-solid fa-square-caret-down fa-2xl fa-beat" style="color: #712d9f;"></i>
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-below">
                                                                <div class="dropdown-title">OPTIONS</div>
                                                                <a href="features-profile.html" class="dropdown-item has-icon">
                                                                    <i class="fa-solid fa-pen-to-square"></i> Edit
                                                                </a>
                                                                <a href="features-activities.html" class="dropdown-item has-icon">
                                                                    <i class="fa-solid fa-trash"></i> Delete
                                                                </a>
                                                            </div>
                                                        </td>
                                                        
                                                    </tr>
                                                    @endforeach
                                                    @endisset
                                                </tbody>
                                            </table>
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



<!-- Quiz Modal -->
<div class="modal fade" id="addQuizModal" tabindex="-1" aria-labelledby="addQuizModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addQuizModalLabel">Add New Quiz</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="newQuizForm" action="{{ route('lectureraddquizform', $lc->id) }}" method="POST">
        @csrf
            <div class="modal-body">
                <div class="form-group">
                  <label for="quizTitle">Quiz Title</label>
                  <input type="text" name="quizTitle" class="form-control" id="quizTitle" required>
                </div>
                <div class="form-group">
                  <label for="quizDescription">Description (Quiz Label)</label>
                  <textarea class="form-control" name="quizDescription" id="quizDescription" rows="3"></textarea>
                </div>
                <div class="form-group">
                  <label for="quizTotalPoints">Total Points</label>
                  <input type="number" name="quizTotalPoints" class="form-control" id="quizTotalPoints" required>
                </div>
                <div class="form-group">
                  <label for="quizTime">Start Date & Time</label>
                  <input type="datetime-local" name="quizTime" class="form-control" id="quizDeadline" required>
                </div>
                <div class="form-group">
                  <label for="quizTimeLimit">Time Limit (minutes)</label>
                  <input type="number" name="quizTimeLimit" class="form-control" id="quizTimeLimit" required>
                </div>
            
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save Quiz</button>
            </div>
      </form>
    </div>
  </div>
</div>

@isset($p->id)
<div class="modal fade comments-modal" id="commentsModal-{{$p->id}}" tabindex="-1" role="dialog"
    aria-labelledby="modelTitle-{{ $p->id }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="commentsModalLabel">Comments</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            </div>
            <div class="modal-footer">
                <!-- Add comment form -->
                <form method="POST" action="{{ route('postcomment', $p->id) }}" id="commentForm" style="width: 100%;">
                    @csrf
                    <input type="text" class="comment-input" placeholder="Write a comment..." class="form-control" />
                    <input type="hidden" name="post-id" value="{{$p->id}}">
                    <button class="btn btn-primary" type="submit">Post Comment</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endisset
@endsection


@section('scripts')
<script src="{{ asset('codiepie/assets/modules/datatables/datatables.min.js') }}"></script>
<script
    src="{{ asset('codiepie/assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('codiepie/assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js') }}"></script>

<script src="https://kit.fontawesome.com/201e2d289f.js" crossorigin="anonymous"></script>
<script src="{{ asset('codiepie/assets/modules/summernote/summernote-bs4.js') }}"></script>
<script src="{{ asset('codiepie/assets/modules/codemirror/lib/codemirror.js') }}"></script>
<script src="{{ asset('codiepie/assets/modules/codemirror/mode/javascript/javascript.js') }}"></script>
<script src="{{ asset('codiepie/assets/modules/jquery-selectric/jquery.selectric.min.js') }}"></script>
<script src="{{ asset('codiepie/js/page/bootstrap-modal.js') }}"></script>
<script type="text/javascript">
    var deletePostUrlTemplate = "{{ route('lecturerpostdelete', ['id' => ':id']) }}";
    var token = "{{ csrf_token() }}"; // Ensure this line is added to define the CSRF token variable
</script>
<script>
    $(document).ready(function () {
        $('#table-1').DataTable({
            dom: 'Bfrtip',  // Add print button

        });
    });
</script>
<script>
    $(document).on('click', '.delete-post', function (e) {
        e.preventDefault();
        var postId = $(this).attr('id').split('-')[2];
        var deleteUrl = deletePostUrlTemplate.replace(':id', postId);


        if (confirm('Are you sure you want to delete this post?')) {
            $.ajax({
                url: deleteUrl,
                type: 'DELETE',
                data: {
                    _token: token // Make sure this variable is defined
                },
                success: function (response) {
                    alert(response.message);
                    location.reload();
                },
                error: function (xhr) {
                    alert('Error occurred: ' + xhr.responseJSON.message);
                }
            });
        }
    });
</script>
<script>

    $(document).ready(function () {
        $(document).on('show.bs.modal', '.comments-modal', function (e) {
            var button = $(e.relatedTarget);
            var postId = button.data('post-id');



            $.ajax({
                type: 'GET',
                url: '/lecturer/getcomments/' + postId,
                success: function (response) {
                    // Populate modal body with fetched comments (which already contain the rendered HTML from 'commentsmodal.blade.php')

                    var modal = $('.comments-modal');
                    modal.find('.modal-body').html(response);

                },
                error: function (error) {
                    // Handle errors gracefully
                    $(this).find('.modal-body').html('<p class="error">Failed to fetch comments.</p>');
                }
            });


            //   $(this).find('.modal-body').load('/commentsmodal'); // Fetch the modal content via AJAX


            // Attach a submit event handler to the form within the modal
            $(this).find('form').off('submit').on('submit', function (event) {
                event.preventDefault();

                // Get the comment text from the input field with class 'comment-input'
                var commentText = $(this).find('.comment-input').val();

                // Check if the comment text is empty
                if (commentText.trim() === '') {
                    alert('Please write a comment.');
                    return;
                }

                // Prepare the data to be sent in the AJAX request
                var formData = {
                    comment: commentText,
                    _token: token, // Ensure 'token' is defined somewhere in your script
                    // Include any other data your controller may need
                };

                // Send the AJAX request to the server
                $.ajax({
                    type: 'POST',
                    url: '/lecturer/postcomment/' + postId, // Append the post ID to the route
                    data: formData,
                    success: function (response) {
                        // Handle the successful response
                        var initials = response.initials;
                        var name = response.name;
                        var currentDate = response.created_at;

                        var newComment = `
                        <div class="comment-item" style="display: flex; align-items: center; margin-bottom: 10px;">
                            <div class="user-initials-circle">${initials}</div>
                            <div class="comment-content" style="margin-left: 8px;">
                                <strong>${name}
                                    <span class="badge badge-success rounded-circle p-0" style="background-color: transparent;" title="Verified">
                                        <i class="fa-solid fa-circle-check fa-lg" style="color: #4c68d7;"></i>
                                    </span></strong>
                                <p>${response.comment.content}</p>
                                <small>${currentDate}</small>
                            </div>
                        </div>
                    `;

                        $('.comments-list').append(newComment);
                    },
                    error: function (error) {
                        alert('Error occurred: ' + error.responseJSON.message);
                    }
                });

                // Clear the input field
                $(this).find('.comment-input').val('');
            });
        });
    });

</script>
<script>
    function openEditor(event, content, postId) {
        // Prevent the default anchor click behavior
        event.preventDefault();

        // Find the corresponding elements for this postId
        var $editor = $('#summernote-' + postId);
        var $saveButton = $('#save-button-' + postId);
        var $closeButton = $('#close-button-' + postId);

        // Load the content into the specific Summernote editor
        $editor.summernote('code', content);

        // Show the save and close buttons for this post
        $saveButton.show();
        $closeButton.show();

        // Hide the existing content ('section-body') for this post
        $('#info-section-' + postId + ' .section-body').hide();

        // // Show the Summernote editor container for this post
        // $editor.show();

        // // Initialize Summernote if it has not been initialized
        // if ($editor.summernote('isEmpty')) {
        //     $editor.summernote({
        //         // Add Summernote options here
        //     });
        // }

        // Optionally, scroll to the editor container to make sure it's in view
        if ($editor.length > 0) {
            $editor[0].scrollIntoView({ behavior: 'smooth', block: 'start' });
        } else {
            console.error('Editor element not found for postId:', postId);
        }

        // Event listener for the close button for this post
        $closeButton.click(function () {

            $('#info-section-' + postId + ' .section-body').show();
            $editor.summernote('reset');
            $editor.summernote('destroy');

            $saveButton.hide();
            $closeButton.hide();
        });

        // Event listener for the save button for this post
        $saveButton.click(function (event) {
            event.preventDefault();

            // Get the content from the specific Summernote editor
            var content = $editor.summernote('code');

            // Set the content to the hidden input for this post
            $('#editor-content-' + postId).val(content);

            // Submit the form for this post
            $('#editor-form-' + postId).submit();
        });
    }

    // Example usage:
    // Assuming `$p->content` contains the content you want to load into `#summernote1`
    // You would call this function when the edit button is clicked, passing the content as an argument.


    //    claswork js functions
    //    document.getElementById('createButton').addEventListener('click', function() {
    //       // Toggle the dropdown visibility
    //       document.getElementById('createDropdown').classList.toggle('show');
    //     });

    // Close the dropdown if the user clicks outside of it
    // window.onclick = function(event) {
    //   if (!event.target.matches('#createButton')) {
    //     var dropdowns = document.getElementsByClassName('dropdown-content');
    //     for (var i = 0; i < dropdowns.length; i++) {
    //       var openDropdown = dropdowns[i];
    //       if (openDropdown.classList.contains('show')) {
    //         openDropdown.classList.remove('show');
    //       }
    //     }
    //   }
    // }

</script>

<style>
    #meet-link {
        margin-top: 0;
    }



    .banner-img {
        /* position: relative;
       
        background-position: center;
        background-size: contain; */
        z-index: -1;
        width: 100%;
        max-height: 200px;
        /* Set the maximum height for the image */
        object-fit: cover;
        filter: brightness(80%);
        border: 1px solid purple;
        border-radius: 10px;
    }

    .hero-inner {
        position: absolute;
        top: 50%;
        left: 55%;
        transform: translate(-50%, -50%);
        font-size: 2.5rem;
        color: #fff;
        opacity: 0.5;
    }

    .action-button {
        position: absolute;
        bottom: 10px;
        left: 50%;
        transform: translateX(-50%);
    }

    .custom-rounded-border {
        border-radius: 1rem !important;
        /* Adjust as needed */
    }

    .circle {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        background-color: #ccc;
        display: flex;
        justify-content: center;
        align-items: center;
        font-weight: bold;
    }

    .edit-buttons {
        display: none;
    }

    /* Comments modal styling */
    .comment-item {
        display: flex;
        align-items: flex-start;
        border-bottom: 1px solid #ddd;
        padding-bottom: 10px;
        margin-bottom: 10px;
    }

    .user-initials-circle {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background-color: #555;
        color: #fff;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 8px;
    }

    .comment-content {
        flex-grow: 1;
    }

    .comment-content strong {
        display: block;
    }

    .comment-content p {
        margin-bottom: 0px;
    }

    #commentForm {
        display: flex;
        width: 100%;
    }

    #commentForm input[type="text"] {
        margin-right: 8px;
        flex-grow: 1;
    }

    #commentForm button {
        white-space: nowrap;
    }

    /* create style */
    .create-btn {
        margin-top: 20px;
    }

    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f9f9f9;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
        z-index: 1;
    }

    .dropdown-content a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
    }

    .dropdown-content a:hover {
        background-color: #f1f1f1;
    }

    .dropdown:hover .dropdown-content {
        display: block;
    }
</style>

@endsection