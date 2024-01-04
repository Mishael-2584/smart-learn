@extends('layouts.body')

@section('content')
<div class="main-content">
    <section class="section">
        @include('layouts.error')
        <div class="section-header">
            <h1>List Of Schools</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Pending Students</a></div>
                <div class="breadcrumb-item">School-list</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title"> List Of Pending Students</h2>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                        <h4> Pending Students</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped v_center" id="table-1">
                                    <form method="POST" action="{{route('adminapproveStudents')}}"> 
                                        @csrf

                                        <thead>
                                          <tr>
                                            <th class="text-center">
                                              <input type="checkbox" id="select-all-checkbox">
                                            </th>
                                            <th>Matric No</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Level</th>
                                            <th>Group</th>
                                            <th>Action</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($students as $index => $student)
                                              <tr>
                                                <td>
                                                  <input type="checkbox" name="student[]" class="student-checkbox" value="{{ $student->id }}">
                                                </td>

                                                <td>{{ $student->matric_no }}</td>
                                                <td>{{ $student->name }}</td>
                                                <td>{{ $student->email }}</td>
                                                <td>
                                                     {{ $student->level }}
                                                </td>
                                                <td> {{ $student->group }} </td>
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
                                            @endforeach
                                          </tbody>
                                    </form>
                                </table>
                            </div>
                            
                            <div class="text-right">
                              <button id="approve-selected" class="btn btn-success">Approve Selected</button>
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
    $('.student-checkbox').prop('checked', $(this).is(':checked'));
  });
});
</script>

<script>
    $(document).ready(function() {
      // Attach a click event handler to the approve-selected button
      $('#approve-selected').click(function() {
        var selectedStudents = [];

        // Iterate over each checked checkbox with the student-checkbox class
        $('.student-checkbox:checked').each(function() {
          // Add the value of the checked checkbox to the selectedStudents array
          selectedStudents.push($(this).val());
        });

        // Log the selectedStudents array
        console.log(selectedStudents);

        // Add the selectedStudents array to a hidden input field in the form
        $('<input>').attr({
          type: 'hidden',
          name: 'selectedStudents',
          value: selectedStudents.join(',')
        }).appendTo('form');

        // Submit the form
        $('form').submit();
      });
    });
</script>
@endsection

