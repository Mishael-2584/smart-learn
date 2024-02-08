@extends('layouts.body')

@section('content')
<!-- Start app main Content -->
<div class="main-content">
    <section class="section">
        @include('layouts.error')
        <div class="section-header">
            <h1>Add a new school</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Schools</a></div>
                <div class="breadcrumb-item">Add a new school</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Add a new school</h2>
            <p class="section-lead">Fill the form to add new School</p>

            <div class="row">
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <br>
                            <form method="POST" action="{{ route('postschool') }}">
                                @csrf
                            <div class="form-group">
                                <label>School Code</label>
                                <input type="text" class="form-control" name="code">
                            </div>
                            <div class="form-group">
                                <label>Full Name Of School</label>
                                <input type="text" name="name" class="form-control" required>
                            </div>
                            <div class="section-title">OTHER</div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea type="text" name="description" class="form-control" cols="30" rows="10"></textarea>
                            </div>
                            <div class="card-footer text-right">
                                <button class="btn btn-primary">Submit</button>
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

