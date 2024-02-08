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
                            <div class="tab-content" id="myTabContent2">
                                <div class="tab-pane fade show active" id="departmental-courses" role="tabpanel" aria-labelledby="departmental-courses-tab">
                                    <!-- Content for Departmental Courses tab -->
                                    
                                            <div class="row">
                                                <div class="col-12 col-md-6 col-lg-6">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <br>
                                                            <form action="{{ route('postcourse') }}?imgpath=" method="POST" id="addCourseForm">
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
                                                                        <input type="text" name="code" class="form-control" placeholder="For Example: COSC-101" required>
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
                                                                        <button type="button" onclick="submitForm()" class="btn btn-primary">Submit</button>
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
                                                <form action="{{ route('postcoursegeds') }}" method="POST">
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
                                                    <form action="{{ route('postcourseunique') }}" method="POST">
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
                                                                <button type="button" class="btn btn-primary">Submit</button>
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

<!-- Include SweetAlert2 from CDN -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    function submitForm() {
        // Use SweetAlert to show the confirmation dialog
        Swal.fire({
            title: 'Are you sure?',
            text: "Please confirm that the information is correct.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, submit it!'
        }).then((result) => {
            if (result.isConfirmed) {
                // If the user confirms, submit the form
                document.getElementById('addCourseForm').submit();
            }
        });
    }
</script>

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

<script>
    // Update the background image based on the course title when the description field is selected
    function updateBackground() {
      const courseTitle = document.getElementById('course-title').value;
    
      // Remove unwanted words from the course title
      const unwantedWords = ['introduction', 'to', 'the', 'a'];
      const words = courseTitle.split(' ');
      const filteredWords = words.filter(word => !unwantedWords.includes(word.toLowerCase()));
      const modifiedTitle = filteredWords.join(' ');
    
      // Make a search request to Unsplash API based on the modified course title
      fetch(`https://api.unsplash.com/search/photos?query=${modifiedTitle}&client_id=xiqqde6OCMztTl9lpHhpVeR5r8553QTLsADAxqlHGuY`)
        .then(response => response.json())
        .then(data => {
          const imageUrl = data.results[0].urls.regular;
            
          
          // Populate the 'imgpath' value in the hidden input field
          document.getElementById('imgpath').value = imageUrl;
    
          console.log(imageUrl); // Log the retrieved image URL
        })
        .catch(error => console.error(error));
    }
    
    // Call updateBackground when the description field is selected
    document.getElementById('description').addEventListener('focus', updateBackground);
</script>

<script>
    // Update the background image based on the course title when the description field is selected
    function updateBackground() {
      const courseTitle = document.getElementById('course-title2').value;
    
      // Remove unwanted words from the course title
      const unwantedWords = ['introduction', 'to', 'the', 'a'];
      const words = courseTitle.split(' ');
      const filteredWords = words.filter(word => !unwantedWords.includes(word.toLowerCase()));
      const modifiedTitle = filteredWords.join(' ');
    
      // Make a search request to Unsplash API based on the modified course title
      fetch(`https://api.unsplash.com/search/photos?query=${modifiedTitle}&client_id=xiqqde6OCMztTl9lpHhpVeR5r8553QTLsADAxqlHGuY`)
        .then(response => response.json())
        .then(data => {
          const imageUrl = data.results[0].urls.regular;
    
          // Populate the 'imgpath' value in the hidden input field
          document.getElementById('imgpath2').value = imageUrl;
    
          console.log(imageUrl); // Log the retrieved image URL
        })
        .catch(error => console.error(error));
    }
    
    // Call updateBackground when the description field is selected
    document.getElementById('description2').addEventListener('focus', updateBackground);
</script>

<script>
    // Update the background image based on the course title when the description field is selected
    function updateBackground() {
      const courseTitle = document.getElementById('course-title3').value;

      // Remove unwanted words from the course title
      const unwantedWords = ['introduction', 'to', 'the', 'a'];
      const words = courseTitle.split(' ');
      const filteredWords = words.filter(word => !unwantedWords.includes(word.toLowerCase()));
      const modifiedTitle = filteredWords.join(' ');

      // Make a search request to Unsplash API based on the modified course title
      fetch(`https://api.unsplash.com/search/photos?query=${modifiedTitle}&client_id=xiqqde6OCMztTl9lpHhpVeR5r8553QTLsADAxqlHGuY`)
        .then(response => response.json())
        .then(data => {
          const imageUrl = data.results[0].urls.regular;

          // Populate the 'imgpath' value in the hidden input field
          document.getElementById('imgpath3').value = imageUrl;

          console.log(imageUrl); // Log the retrieved image URL
        })
        .catch(error => console.error(error));
    }

    // Call updateBackground when the description field is selected
    document.getElementById('description3').addEventListener('focus', updateBackground);
</script>
@endsection