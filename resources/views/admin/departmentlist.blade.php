@extends('layouts.body')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>List Of Departments</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Schools</a></div>
                <div class="breadcrumb-item">Department-list</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">List Of Departments</h2>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                        <h4>DEPARTMENTS</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped v_center" id="table-1">
                                    <thead>
                                        <tr>
                                        <th class="text-center">
                                            #
                                        </th>
                                        <th>Department Name</th>
                                        <th>Name Of School</th>
                                        <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>@php $count=0 @endphp
                                        @foreach ($departments as $department)
                                        <tr>
                                            <td>@php $count += 1; echo($count); @endphp</td>
                                            <td>{{$department->name}}</td>
                                            <td>{{$department->school->name}}</td>
                                            <td>
                                                <a href="#" data-toggle="dropdown"  class="dropdown btn">
                                                    <i class="fa-solid fa-square-caret-down fa-2xl fa-beat" style="color: #712d9f;"></i></a>
                                                    <div class="dropdown-menu dropdown-menu-below">
                                                    <div class="dropdown-title">OPTIONS</div>
                                                    <a href="features-profile.html" class="dropdown-item has-icon">
                                                        <i class="fa-solid fa-pen-to-square"></i> Edit
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
@endsection

