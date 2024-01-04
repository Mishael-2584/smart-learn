@extends('layouts.body')


@section('content')

<!-- Start app main Content -->
<div class="main-content">
    <section class="section">
        @include('layouts.error')
        <div class="section-header">
            <h1>Profile</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item">Profile</div>
            </div>
        </div>
        <div class="section-body">
            
            <h2 class="section-title">Hi, @isset($student) {{ $student->name }} @endisset </h2>
            <p class="section-lead">Change information about yourself on this page.</p>

            <div class="row mt-sm-4">
                <div class="col-12 col-md-12 col-lg-5">
                  <div class="card profile-widget">
                    <div class="profile-widget-header">
                    </div>
                    <div class="profile-widget-items">
                      <div class="profile-widget-item">
                        <div class="profile-widget-item-label"><strong>Classes</strong></div>
                        <div class="profile-widget-item-value"></div>
                      </div>
                      <div class="profile-widget-item">
                        <div class="profile-widget-item-label"><strong>Lecturers</strong></div>
                        <div class="profile-widget-item-value"></div>
                      </div>
                      <div class="profile-widget-item">
                        <div class="profile-widget-item-label"><strong>Following</strong></div>
                        <div class="profile-widget-item-value"></div>
                      </div>
                    </div>
                    <div class="profile-widget-items">
                      <div class="profile-widget-item">
                        <div class="profile-widget-item-label"><strong>Verification Status</strong></div>
                        <div class="profile-widget-item-value">
                          @if(isset($student) && $student->status == 2)
                            <span class="badge badge-success rounded-circle p-0" style="background-color: transparent;" title="Verified">
                              <i class="fas fa-check-circle fa-lg text-success"></i>
                              <span class="profile-widget-status badge badge-success" style="color: rgb(255, 255, 255)">Verified</span>
                            </span>
                          @elseif(isset($student) && $student->status == 1)
                            <span class="badge badge-warning rounded-circle p-0" style="background-color: transparent;" title="Pending Approval">
                              <i class="fas fa-clock fa-lg text-warning"></i>
                              <span class="profile-widget-status badge badge-warning" style="color: rgb(0, 0, 0)">Pending Approval</span>
                            </span>
                          @else
                            <span class="badge badge-danger rounded-circle p-0" style="background-color: transparent;" title="Not Verified">
                              <i class="fas fa-times-circle fa-lg text-danger"></i>
                              <span class="profile-widget-status badge badge-danger" style="color: rgb(255, 255, 255)">Not Verified</span>
                            </span>
                          @endif
                        </div>
                      </div>
                    </div>
                    <br>
                    <div class="profile-widget-description">
                      <div class="profile-widget-contact-label"><strong>Name:</strong></div>
                      <div class="profile-widget-value">
                        {{ $student->name }}
                      </div>
                      <br>
                      <div class="profile-widget-contact">
                        <div class="profile-widget-contact-item">
                          <div class="profile-widget-contact-label"><strong>Email:</strong></div>
                          <div class="profile-widget-contact-value">{{ $student->email }}</div>
                        </div>
                        <br>
                        <div class="profile-widget-contact-item">
                          <div class="profile-widget-contact-label"><strong>Course Of Study:</strong></div>
                          <div class="profile-widget-contact-value">{{ $student->major->title }}</div>
                        </div>
                        <br>
                        <div class="profile-widget-contact-item">
                            <div class="profile-widget-contact-label"><strong>Level:</strong></div>
                            <div class="profile-widget-contact-value">{{ $student->level }}</div>
                        </div>
                        <br>
                        <div class="profile-widget-contact-item">
                          <div class="profile-widget-contact-label"><strong>Group:</strong></div>
                          <div class="profile-widget-contact-value">{{ $student->group }}</div>
                        </div>
                      </div>
                    </div>
                    <div class="card-footer text-center">
                      <div class="font-weight-bold mb-2">Follow {{ $student->name }} On</div>
                      <a href="#" class="btn btn-social-icon btn-facebook mr-1"><i class="fab fa-facebook-f"></i></a>
                      <a href="#" class="btn btn-social-icon btn-twitter mr-1"><i class="fab fa-twitter"></i></a>
                      <a href="#" class="btn btn-social-icon btn-github mr-1"><i class="fab fa-github"></i></a>
                      <a href="#" class="btn btn-social-icon btn-instagram"><i class="fab fa-instagram"></i></a>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-md-12 col-lg-7">
                    <div class="card">
                        <form method="post" action="{{ route('updatestudentprofileinfo') }}" id="update_profile_form" class="needs-validation" novalidate="">
                            @csrf
                            <div class="card-header">
                                
                                <h6>Please Fill All Required Fields To Verify Your Profile and Start Teaching</h6>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-md-12 col-12">
                                        <label>Full Name</label>
                                        <input type="text" class="form-control" value="{{$student->name}}" name="name" required>
                                        <div class="invalid-feedback">Please fill in the first name</div>
                                    </div>
                                    <div class="form-group col-md-12 col-12">
                                        <label>Select Your Course Of Study *</label>
                                        <select id="major" name="major" class="form-control" required>
                                            @isset($majors)
                                                @foreach ($majors as $major)
                                                    <option value="{{ $major->id }}"> {{ $major->title }} </option>
                                                @endforeach
                                            @endisset
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label>Email</label>
                                        <input type="email" name="email" class="form-control" value="{{$student->email}}" required="">
                                        <div class="invalid-feedback">Please fill in the email</div>
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label>Level</label>
                                        <input name="level" type="text" class="form-control" value="{{$student->level}}" placeholder="Ex: 100, 200, 300, 400">
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label>Group</label>
                                        <input name="group" type="text" class="form-control" value="{{$student->group}}">
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label>Matric Number</label>
                                        <input name="matric" type="text" class="form-control" value="{{$student->matric_no}}">
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <!-- Button to trigger the modal -->

                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#passwordModal">Save Changes</button>
                            </div>
                        </form>
                    </div>
                </div>
                
               
               
               
            </div>
        </div>
    </section>
</div>

<!-- Modal -->
<div class="modal fade" id="passwordModal" tabindex="-1" role="dialog" aria-labelledby="passwordModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="passwordModalLabel">Confirm Password</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="#">
          @csrf
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="passwordmodal" name="passwordmodal" required>
          </div>
          <button type="button" class="btn btn-primary" onclick="handleFormSubmit(event)">Confirm</button>
        </form>
      </div>
    </div>
  </div>
</div>






@endsection


@section('scripts')

<script>
// Function to handle form submission
function handleFormSubmit(event) {
  event.preventDefault(); // Prevent the default form submission

  // Get the password input value
  var passwordInput = document.getElementById('passwordmodal');
  var password = passwordInput.value;

  // Add the password as a hidden input field to the form
  var form = document.getElementById('update_profile_form');
  var passwordField = document.createElement('input');
  passwordField.type = 'hidden';
  passwordField.name = 'password';
  passwordField.value = password;
  form.appendChild(passwordField);

  // Submit the form
  form.submit();
}
</script>


<script src="{{ asset("codiepie/assets/modules/summernote/summernote-bs4.js") }}"></script>
<script src="{{ asset("codiepie/assets/modules/select2/dist/js/select2.full.min.js") }}"></script>
<script src="{{ asset("codiepie/assets/modules/jquery-selectric/jquery.selectric.min.js") }}"></script>
<!-- JS Libraies -->
{{-- <script src="{{ asset("codiepie/assets/modules/prism/prism.js") }}"></script> --}}

<!-- Page Specific JS File -->
<script src=" {{ asset("codiepie/js/page/bootstrap-modal.js") }}"></script>

<!-- Page Specific JS File -->
<script src="{{ asset("codiepie/js/page/forms-advanced-forms.js") }}"></script>
@endsection