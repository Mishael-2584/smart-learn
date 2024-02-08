@extends('layouts.body')



@section('content')

<!-- Start app main Content -->
<div class="main-content">
    <section class="section">
        @include('layouts.error')
        <div class="section-header">
            <h1>Add a new school</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Departments</a></div>
                <div class="breadcrumb-item">Add a new department</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Add a new department</h2>
            <p class="section-lead">Fill the form to add new department</p>

            <div class="row">
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <br>
                            <form method="POST" action="{{ route('postdepartment') }}" id="addDepartmentForm">
                                @csrf
                            <div class="form-group">
                                <div class="section-title">Fill the form below</div>
                                <div class="form-group">
                                    <label>Select School</label>
                                    <select class="form-control select2" id="school" name="school">
                                        @foreach ($schools as $school)
                                        <option value="{{ $school->id }}">{{ $school->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Name Of Department</label>
                                <input type="text" name="name" class="form-control" placeholder="For Example: Department Of Computer Science" required>
                            </div>
                            <div class="card-footer text-right">
                                <button type="button" class="btn btn-primary" onclick="submitForm()">Submit</button>
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
                document.getElementById('addDepartmentForm').submit();
            }
        });
    }
</script>
    
@endsection