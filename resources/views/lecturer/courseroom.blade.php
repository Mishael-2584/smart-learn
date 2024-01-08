@extends('layouts.body')


@section('content')

<div class="main-content">
    <div class="section">
        @include('layouts.error')
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
                                                <div class="card rounded bg-light">
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
                                                           <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                                           <div class="col-sm-10 col-md-7 col-lg-3 ml-auto ">
                                                               <button type="submit" class="btn btn-primary">Post</button>
                                                               <button type="button" class="btn btn-secondary">Cancel</button>
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
                                                <div class="card bg-light">

                                                    
                                                        @if ($p->student)
                                                        <div class="card-body">
                                                            <div class="section-header">{{$p->student->name}}</div>
                                                            <p></p>





                                                        </div>
                                                            
                                                        @else


                                                            
                                                        
                                                        <div class="card-body" id="post-{{$p->id}}">
                                                            <div id="info-section-{{$p->id}}" class="section">
                                                                <div class="section-head bg-light" style="display: flex; justify-content: space-between; align-items: center;">
                                                                    <div style="display: flex; align-items: center;">
                                                                        <div class="circle">{{ $p->lecturer->initials }}</div>
                                                                        <div style="margin-left: 8px;">
                                                                            <strong>{{ $p->lecturer->name }}</strong><br>
                                                                            <small>{{ $p->updated_at }}</small>
                                                                        </div>
                                                                    </div>
                                                                    <div class="dropdown" style="padding: 4px; border-radius: 4px;">
                                                                        <div class="dropdown" data-toggle="dropdown">
                                                                            <i class="fa-sharp fa-solid fa-ellipsis-vertical rounded" style="padding: 4px; border-radius: 4px; border: 1px solid #ccc;"></i>
                                                                        </div>
                                                                        <div class="dropdown-menu dropdown-menu-right" id="dropdown-menu-{{$p->id}}">
                                                                            <a href="#" class="dropdown-item has-icon" id="edit-item-{{$p->id}}" onclick="openEditor(event, <?php echo htmlspecialchars(json_encode($p->content)); ?>, '<?php echo $p->id; ?>'); return false;">
                                                                                <i class="fa-solid fa-pen-to-square"></i> Edit
                                                                            </a>
                                                                            <a class="dropdown-item delete-post" id="delete-item-{{$p->id}}" href="#"><i class="fas fa-trash"></i> Delete</a>
                                                                        </div>
                                                                    </div>
                                                                </div>        
                                                                <hr>
                                                                <div class="section-body" id="section-body-{{$p->id}}">
                                                                    {!! $p->content !!}
                                                                </div>
                                                            </div>
                                                            <form id="editor-form-{{$p->id}}" action="{{ route('lecturerpostedit', $p->id) }}" method="post">
                                                                @csrf
                                                                <input id="editor-content-{{$p->id}}" type="hidden" name="editcontent" id="editor-content-{{$p->id}}">
                                                                <div id="summernote-{{$p->id}}" class="form-group row mb-4" style="display: none;">
                                                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                                                        <input type="hidden" name="content" id="editor-content-{{$p->id}}">
                                                                        <!-- Ensure the ID here is unique and different from the DIV's ID -->
                                                                        
                                                                    </div>
                                                                </div>
                                                                <button type="submit" id="save-button-{{$p->id}}" class="btn btn-success edit-buttons">Save Changes</button>
                                                                <button type="button" id="close-button-{{$p->id}}" class="btn btn-secondary edit-buttons">Close</button>
                                                            </form>
                                                        </div>
                                                        @endif
                                                    
                                                    
                                                </div>
                                                @endforeach
                                                @endisset
                                            </div>
                                                                                                              
                                        </div>
                                    
                                    </div>
                                    <div class="tab-pane fade" id="submissions" role="tabpanel" aria-labelledby="submissions-tab">
                                    


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
@endsection


@section('scripts')
<script src="{{ asset("codiepie/assets/modules/datatables/datatables.min.js") }}"></script>
<script src="{{ asset("codiepie/assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js") }}"></script>
<script src="{{ asset("codiepie/assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js") }}"></script>

<script src="https://kit.fontawesome.com/201e2d289f.js" crossorigin="anonymous"></script>
<script src="{{ asset('codiepie/assets/modules/summernote/summernote-bs4.js') }}"></script>
<script src="{{ asset('codiepie/assets/modules/codemirror/lib/codemirror.js') }}"></script>
<script src="{{ asset('codiepie/assets/modules/codemirror/mode/javascript/javascript.js') }}"></script>
<script src="{{ asset('codiepie/assets/modules/jquery-selectric/jquery.selectric.min.js') }}"></script>
<script type="text/javascript">
    var deletePostUrlTemplate = "{{ route('lecturerpostdelete', ['id' => ':id']) }}";
    var token = "{{ csrf_token() }}"; // Ensure this line is added to define the CSRF token variable
</script>
<script>
    $(document).on('click', '.delete-post', function(e) {
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
                success: function(response) {
                    alert(response.message);
                    location.reload();
                },
                error: function(xhr) {
                    alert('Error occurred: ' + xhr.responseJSON.message);
                }
            });
        }
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
    $closeButton.click(function() {
        
        $('#info-section-' + postId + ' .section-body').show();
        $editor.summernote('reset');
        $editor.summernote('destroy');
        
        $saveButton.hide();
        $closeButton.hide();
    });

    // Event listener for the save button for this post
    $saveButton.click(function(event) {
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
</script>

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
    
  </style>
    
@endsection