@extends('layouts.body')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>List Of Majors</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Schools</a></div>
                <div class="breadcrumb-item">Major-list</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">List Of Majors</h2>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>MAJORS</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped v_center" id="table-1">
                                    <thead>
                                        <tr>
                                            <th class="text-center">
                                                #
                                            </th>
                                            <th>Major Name</th>
                                            <th>Name Of School</th>
                                            <th>Department</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                        $count = 0;
                                        @endphp
                                        @foreach ($majors as $major)
                                        <tr>
                                            <td>
                                                @php
                                                $count += 1;
                                                echo($count);
                                                @endphp
                                            </td>
                                            <td>{{$major->title}}</td>
                                            <td>{{$major->department->school->name}}</td>
                                            <td>{{$major->department->name}}</td>
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
                                    </tbody>
                                </table>
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
    var table = $('#table-1').DataTable({
        // other initialization options...
        destroy: true
    });

    // Add filter inputs for schools and departments
    table.columns([2, 3]).every(function() {
        var column = this;
        var select = $('<select><option value=""></option></select>')
            .appendTo($(column.header()).empty())
            .on('change', function() {
                var val = $.fn.dataTable.util.escapeRegex(
                    $(this).val()
                );
                column
                    .search(val ? '^' + val + '$' : '', true, false)
                    .draw();
            });

        // Get the unique values for the column
        column.data().unique().sort().each(function(d, j) {
            select.append('<option value="' + d + '">' + d + '</option>');
        });
    });
});
</script>

@endsection