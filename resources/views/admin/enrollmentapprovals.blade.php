@extends('layouts.body')

@section('content')
<div class="main-content">
    <section class="section">
        @include('layouts.error')
        <div class="section-header">
            <h1>List Of Course Approvals</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Pending Course Approvals</a></div>
                <div class="breadcrumb-item">School-list</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title"> List Of Pending Course Approvals</h2>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                        <h4> Pending Course Approvals</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped v_center" id="table-1">
                                    <form method="POST" action="{{route('approvecourses')}}"> 
                                        @csrf

                                        <thead>
                                          <tr>
                                            <th class="text-center">
                                              <input type="checkbox" id="select-all-checkbox">
                                            </th>
                                            <th>Select All</th>

                                            <th>Lecturer</th>
                                            <th>Course Code</th>
                                            <th>Course Title</th>
                                            <th>Action</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($enrollments as $index => $enrollment)
                                            @if($enrollment->status == 0)
                                              <tr>
                                                <td>
                                                  <input type="checkbox" name="lecturer[]" class="lecturer-checkbox" value="{{ $enrollment->id }}">
                                                </td>

                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $enrollment->lecturer->name }}</td>
                                                @if ($enrollment->course_id == null)
                                                <td>{{ $enrollment->departmentcourse->course->course_code }}</td>
                                                <td>{{ $enrollment->departmentcourse->course->title }}</td>
                                                @else
                                                <td>{{ $enrollment->course->course_code }}</td>
                                                <td>{{ $enrollment->course->title }}</td>    
                                                @endif
                                                
                                                <td>
                                                  <div class="dropdown">
                                                    <a href="#" data-toggle="dropdown" class="dropdown-toggle btn">
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
                                                  </div>
                                                </td>
                                              </tr>
                                            @endif
                                            @endforeach
                                          </tbody>
                                    </form>
                                </table>
                            </div>
                            
                            <div class="text-right">
                              <button id="approve-selected" class="btn btn-success">Approve Selected</button>
                              <button id="reject-selected" class="btn btn-danger">Reject Selected</button>
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
    <!-- JS Libraies -->
<script src="{{ asset("codiepie/assets/modules/datatables/datatables.min.js") }}"></script>
<script src="{{ asset("codiepie/assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js") }}"></script>
<script src="{{ asset("codiepie/assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js") }}"></script>
<script src="{{ asset("codiepie/assets/modules/jquery-ui/jquery-ui.min.js") }}"></script>

<!-- Page Specific JS File -->
<script src="{{ asset("codiepie/js/page/modules-datatables.js") }}"></script>

<script>
    $(document).ready(function() {
  $('#select-all-checkbox').change(function() {
    $('.lecturer-checkbox').prop('checked', $(this).is(':checked'));
  });
});
</script>
<script>
    $(document).ready(function() {
      // Attach a click event handler to the approve-selected button
      $('#approve-selected').click(function() {
        var selectedLecturers = [];

        // Iterate over each checked checkbox with the lecturer-checkbox class
        $('.lecturer-checkbox:checked').each(function() {
          // Add the value of the checked checkbox to the selectedLecturers array
          selectedLecturers.push($(this).val());
        });

        // Log the selectedLecturers array
        console.log(selectedLecturers);

        // Add the selectedLecturers array to a hidden input field in the form
        $('<input>').attr({
          type: 'hidden',
          name: 'selectedLecturers',
          value: selectedLecturers.join(',')
        }).appendTo('form');

        // Submit the form
        $('form').submit();
      });
    });
</script>
@endsection


