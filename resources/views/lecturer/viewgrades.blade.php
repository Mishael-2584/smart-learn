@extends('layouts.body')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>{{$quiz->title}} Grades</h1>
        </div>

        <div class="section-body">
            <div class="row">

                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>View Grade</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr>
                                            <th class="text-center">
                                                #
                                            </th>
                                            <th>Student Name</th>
                                            <th>Grade</th>
                                            <th>Time Submitted</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @isset($submissions)
                                        @foreach ($submissions as $index => $qg)
                                        <tr>
                                            <td>{{$index+1}}</td>
                                            <td>{{$qg->student->name}}</td>
                                            <td>{{ number_format($qg->score, 2) }} / {{$qg->quiz->total_points}}</td>
                                            <td>{{ \Carbon\Carbon::parse($qg->submittion_time)->format('M d, Y g:i A') }}</td>
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
    </section>
</div>   
@endsection


@section('scripts')
<script src="{{ asset("codiepie/assets/modules/datatables/datatables.min.js") }}"></script>
<script src="{{ asset("codiepie/assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js") }}"></script>
<script src="{{ asset("codiepie/assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js") }}"></script>
<script src="{{ asset("codiepie/assets/modules/jquery-ui/jquery-ui.min.js") }}"></script>

<!-- Page Specific JS File -->
<script src="{{ asset("codiepie/js/page/modules-datatables.js") }}"></script>
@endsection
