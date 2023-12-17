@extends('layouts.body')

@section('content')

<!-- Start app main Content -->
<div class="main-content">

    <section class="section">
        @include('layouts.error')
        <div class="section-header">
            <h1>Enroll For GEDS Course</h1>
        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('enrollunique', $course->id) }}" method="POST">
                                @csrf                                     
                                <div class="form-group">
                                    <label for="title">Course Title:</label>
                                    <input type="text" name="title" id="title" value="{{$course->title}}" class="form-control" disabled>
                                </div>

                                <div class="form-group">
                                    <label for="description"> Course Description:</label>
                                    <input type="text" name="description" id="description" value="{{$course->description}}" class="form-control" disabled>
                                </div>
                            
                                <div class="form-group">
                                    <label for="day">Day:</label>
                                    <select name="day" id="day" class="form-control">
                                        <option value="Sunday">Sunday</option>
                                        <option value="Monday">Monday</option>
                                        <option value="Tuesday">Tuesday</option>
                                        <option value="Wednesday">Wednesday</option>
                                        <option value="Thursday">Thursday</option>
                                        <option value="Friday">Friday</option>
                                        <option value="Saturday">Saturday</option>
                                    </select>
                                </div>
                            
                                <div class="form-group">
                                    <label for="start_time">Start Time:</label>
                                    <input type="text" name="start-time" id="" class="form-control timepicker">
                                </div>
                                
                                <div class="form-group">
                                    <label for="end_time">End Time:</label>
                                    <input type="text" name="end-time" id="" class="form-control timepicker">
                                </div>
                        
                                <div class="row clearfix form-group">
                                    <div class="col-sm-6">
                                        <label for="link-type">Choose link type:</label>
                                        <select name="link-type" class="form-control" id="link-type">
                                            <option value="generate">Generate Link Automatically</option>
                                            <option value="custom">Custom Link</option>
                                        </select>
                                        <br>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group" id="link-container">
                                            <label for="meet-link">Meet Link:</label><br>
                                            <input class="form-control" type="text" name="meet-link" id="meet-link" value="{{$course->meet_url}}" placeholder="Enter custom link here" disabled>
                                        </div>
                                    </div>
                                </div>
                            
                                <button type="submit" class="btn btn-primary">Enroll</button>
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

{{-- <script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script> --}}
<script>
    $(document).ready(function() {
        $('input.timepicker').timepicker({
            timeFormat: 'h:mm p',
            interval: 15,
            minTime: '0',
            maxTime: '11:59pm',
            defaultTime: '11:35pm',
            startTime: '10:00',
            dynamic: false,
            dropdown: true,
            scrollbar: true
        });
    });
</script>

<script>
    const linkTypeSelect = document.querySelector('#link-type');
    const linkContainer = document.querySelector('#link-container');
    const meetLinkInput = document.querySelector('#meet-link');
    
    linkTypeSelect.addEventListener('change', (e) => {
        const linkType = e.target.value;
        if (linkType === 'generate') {
            linkContainer.style.display = 'none';
            meetLinkInput.disabled = true;
        } else if (linkType === 'custom') {
            linkContainer.style.display = 'block';
            meetLinkInput.disabled = false;
        }
    });
</script>

@endsection