@extends('layouts.body')

@section('content')

<!-- Start app main Content -->
<div class="main-content">

    <div class="section">
        <div class="section-body pt-4">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-body">
                                <style>
                                    body {
                                        padding: 20px;
                                    }
                                </style>

                                <div class="container">
                                    
                                    <h2 class="mt-4">Take Quiz</h2>
                                    <p id="timer" class="text-danger"></p>
                                    
                                    @isset($quiz->questions)
                                    <form id="quizForm">
                                        @csrf
                                        
                                        
                                        @php
                                           $QnNo = 0; 
                                        @endphp
                                        @foreach ($quiz->questions as $question)
                                            <div class="question-group">
                                                <input type="hidden" name="questions[{{ $QnNo + 1 }}][type]" value="{{ $question->type }}">
                                
                                                @if ($question->type === 'short')
                                                    <br><div class="form-group">
                                                        <label class="question-label">
                                                            Question {{ $QnNo + 1 }} (Short Answer)
                                                            <strong class="text-success">{{ $question->points }} points</strong>
                                                            <br>
                                                            <h6>{{ $question->text }}</h6>
                                                        </label>
                                                        <input type="hidden" name="questions[{{ $QnNo + 1 }}][id]" value="{{ $question->id }}">
                                                        <input type="hidden" name="questions[{{ $QnNo + 1 }}][points]" value="{{ $question->points }}">
                                                        <input type="text" name="questions[{{ $QnNo + 1 }}][answer]" class="form-control">
                                                    </div>
                                                @elseif ($question->type === 'mcq')
                                                    <br>
                                                    <div class="form-group">
                                                        <label class="question-label">
                                                            Question {{ $QnNo + 1 }} (Objective)
                                                            <strong class="text-success">{{ $question->points }} points</strong>
                                                            <br>
                                                            <h6>{{ $question->text }}</h6>
                                                        </label>
                                                        <input type="hidden" name="questions[{{ $QnNo + 1 }}][id]" value="{{ $question->id }}">
                                                        <input type="hidden" name="questions[{{ $QnNo + 1 }}][points]" value="{{ $question->points }}">
                                
                                                        @foreach ($question->choices as $choiceLetter => $choice)
                                                            <div class="form-check">
                                                                <input type="radio" name="questions[{{ $QnNo + 1 }}][answer]" value="{{ chr(65 + $choiceLetter) }}" class="form-check-input">
                                                                <label class="form-check-label">{{ chr(65 + $choiceLetter) }}. {{ $choice['written_response'] }}</label>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                @elseif ($question->type === 'truefalse')
                                                    <br><div class="form-group">
                                                        <label class="question-label">
                                                            Question {{ $QnNo + 1 }} (True/False)
                                                            <strong class="text-success">{{ $question->points }} points</strong>
                                                            <br>
                                                            <h6>{{ $question->text }}</h6>
                                                        </label>
                                                        <input type="hidden" name="questions[{{ $QnNo + 1 }}][id]" value="{{ $question->id }}">
                                                        <input type="hidden" name="questions[{{ $QnNo + 1 }}][points]" value="{{ $question->points }}">
                                                        <select class="form-control" id="questions[{{ $QnNo + 1 }}][answer]" name="questions[{{ $QnNo + 1 }}][answer]">
                                                            <option value="1">True</option>
                                                            <option value="0">False</option>
                                                        </select>
                                                    </div>
                                                @endif
                                            </div>
                                            @php $QnNo++ @endphp
                                        @endforeach
                                
                                        <button type="submit" id="submitQuizButton" class="btn btn-primary">Submit Quiz</button>
                                    </form>
                                    @endisset

                                    <div class="mt-4" id="score-display">
                                        
                                    </div>
                                </div>

                                <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
                                <script src="{{ asset("codiepie/assets/modules/jquery-selectric/jquery.selectric.min.js") }}"></script>
                                <script
                                    src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
                                <script
                                    src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
                                <script>
                                    const timerDuration = {{ intval($quiz->time_limit) * 60 }}; // Set timer duration
                                    let timerValue = parseInt(localStorage.getItem('timerValue')) || timerDuration;
                                    
                                    function updateTimer() {
                                      const timerDisplay = document.getElementById('timer');
                                      timerDisplay.textContent = `Time remaining: ${Math.floor(timerValue / 60)}:${(timerValue % 60).toString().padStart(2, '0')}`;
                                    
                                      localStorage.setItem('timerValue', timerValue);
                                    
                                      if (timerValue <= 0) {
                                        submitFormViaAjax();
                                      } else {
                                        timerValue--;
                                      }
                                    }

                                    $(document).ready(function() {
                                        // Event listener for your submit button
                                        $('#quizForm').on('submit', function(e) {
                                            e.preventDefault(); // Prevent the default form submission
                                            submitFormViaAjax(); // Call your function
                                        });
                                    });

                                    
                                    
                                    function submitFormViaAjax() {
                                      clearInterval(updateTimerInterval); // Stop timer updates

                                        quizId = "{{ $quiz->id }}";
                                        var token = "{{ csrf_token() }}";
                                        console.log(token);

                                        $.ajax({
                                                url: '/student/storeanswers/' + quizId, // Submit to the same route
                                                type: 'POST',
                                                data: $('#quizForm').serialize() + '&_token=' + token,
                                                dataType: 'json',
                                                success: function(response) {
                                                    console.log(response);
                                                    if (response.success) {
                                                        // Store answers in database
                                                        const submissionId = response.submissionId;
                                                        console.log(submissionId);
                                                        $.ajax({
                                                            url: '/student/calculatescore/' + submissionId, // Assuming a route for score calculation
                                                            type: 'GET',
                                                            success: function(response) {
                                                                // Display the calculated score
                                                                if (response.success) {
                                                                    disableInputsAndShowScore(response.score, response.total);
                                                                    
                                                                }
                                
                                                            },
                                                            error: function(error) {
                                                                // Handle errors
                                                                console.log(error);
                                                            }
                                                        });
                                                    } else {
                                                        // Handle errors
                                                        console.log('Hello');
                                                    }
                                                },
                                                error: function(xhr, status, error) {
                                                        // Handle error
                                                        console.log(error);
                                                }
                                        });
                                          
                                    }

                                    function disableInputsAndShowScore(score, total) {
                                      // Disable all inputs within the form
                                      $('#quizForm').find('input, select').prop('disabled', true);

                                      // Hide the submit button
                                      $('#submitQuizButton').hide();

                                      // Show the score with enhanced design
                                      $('#score-display').html(`<h4 class="text-white">Your score is: ${score} / ${total}</h4>`).addClass('bg-primary text-center p-4 rounded-lg');
                                    }
                                    
                                    const updateTimerInterval = setInterval(updateTimer, 1000);
                                    
                                    window.addEventListener('load', () => {
                                      if (localStorage.getItem('formSubmitted')) {
                                        // No need to recalculate score since it's already available
                                      } else {
                                        // Start the timer
                                      }
                                    });
                                </script>


                        </div>
                    </div>

                </div>

            </div>

        </div>


    </div>

</div>

@endsection