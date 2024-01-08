@extends('layouts.body')



@section('content')

<!-- Start app main Content -->
<div class="main-content">
    <section class="section">
        @include('layouts.error')
        <div class="section-header">
            <h1>Add a new Major</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">majors</a></div>
                <div class="breadcrumb-item">Add a new major</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Add a new major</h2>
            <p class="section-lead">Fill the form to add new major</p>

            <div class="row">
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <br>
                            <form action="{{ route('postmajor') }}" method="POST">
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
                                        <label>Course Of Study</label>
                                        <input type="text" name="major" class="form-control" required>
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