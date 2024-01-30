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

                            <body>
                            <style>
                                    body {
                                        padding: 20px;
                                    }
                                </style>

                                <div class="container">
                                    
                                    <h2 class="mt-4">Take Quiz</h2>
                                    <p id="timer" class="text-danger"></p>
                                    
                                    @isset($quiz->questions)
                                    <form id="quizForm" method="POST" action="{{ route('studenttakequiz', $quiz->id) }}">
                                        @csrf
                                    <?php $questionNo = 0; ?>
                                    @foreach ($data as $type => $questions)
                                    
                                        @foreach ($questions as $questionNumber => $question)
                                          <div class="question-group">
                                            <input type="hidden" name="questions[{{ $questionNo + 1 }}][type]" value="{{ $type }}">
                                            
                                            @if ($type === 'short')
                                              <br><div class="form-group">
                                                <label class="question-label">Question {{ $questionNo + 1 }} (Short Answer) <strong class="text-success">{{ $question['points']}} points</strong> <br> <h6>{{ $question['text'] }}</h6></label>
                                                <input type="hidden" name="questions[{{ $questionNo + 1 }}][id]" value="{{ $question['id'] }}">
                                                <input type="hidden" name="questions[{{ $questionNo + 1 }}][points]" value="{{ $question['points'] }}">
                                                <input type="text" name="questions[{{ $questionNo + 1 }}][answer]" class="form-control" required>
                                              </div>
                                            @elseif ($type === 'mcq')
                                            <br>
                                            <div class="form-group">
                                                <label class="question-label">Question {{ $questionNo + 1 }} (Objective) <strong class="text-success">{{ $question['points']}} points</strong> <br> <h6>{{ $question['text'] }}</h6></label>
                                                <input type="hidden" name="questions[{{ $questionNo + 1 }}][id]" value="{{ $question['id'] }}">
                                                <input type="hidden" name="questions[{{ $questionNo + 1 }}][points]" value="{{ $question['points'] }}">
                                            
                                                @foreach ($question['choices'] as $choiceLetter => $choice)
                                                    <div class="form-check">
                                                        <input type="radio" name="questions[{{ $questionNo + 1 }}][answer]" class="form-check-input" value="{{ $choiceLetter }}" required>
                                                        <label class="form-check-label">{{ $choice['option'] }}. {{ $choice['written_response'] }}</label>
                                                    </div>
                                                @endforeach
                                            </div>
                                            @elseif ($type === 'truefalse')
                                              <br><div class="form-group">
                                                  <label class="question-label">Question {{ $questionNo + 1 }} (True/False)  <strong class="text-success">{{ $question['points']}} points</strong> <br> <h6>{{ $question['text'] }}</h6></label>
                                                  <input type="hidden" name="questions[{{ $questionNo + 1 }}][id]" value="{{ $question['id'] }}">
                                                  <input type="hidden" name="questions[{{ $questionNo + 1 }}][points]" value="{{ $question['points'] }}">
                                                    <select class="form-control" id="questions[{{ $questionNo + 1 }}][answer]" name="questions[{{ $questionNo + 1 }}][answer]">
                                                        <option value="1">True</option>
                                                        <option value="0">False</option>
                                                    </select>
                                              </div>
                                            @endif                      
                                            
                                            <?php $questionNo++; ?>
                                        </div> 
                                        @endforeach
                                    @endforeach       
                                @endisset
                                        <button type="button" class="btn btn-primary"
                                            onclick="calculateScore()">Submit</button>
                                    </form>

                                    <div class="mt-4" id="result"></div>
                                </div>

                                <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
                                <script
                                    src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
                                <script
                                    src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
                                <script>
                                    // Set the timer duration in seconds
                                    const timerDuration = {{intval($quiz->time_limit) * 60}}; // 3 minutes

                                    // Initialize the timer value
                                    let timerValue = timerDuration;

                                    // Update the timer display
                                    function updateTimer() {
                                        const timerDisplay = document.getElementById('timer');
                                        timerDisplay.textContent = `Time remaining: ${Math.floor(timerValue / 60)}:${(timerValue % 60).toString().padStart(2, '0')}`;

                                        // Check if the timer has expired
                                        if (timerValue <= 0) {
                                            // Automatically submit the form when the timer expires
                                            document.getElementById('quizForm').submit();
                                        }

                                        // Decrement the timer value
                                        timerValue--;
                                    }

                                    // Update the timer every second
                                    setInterval(updateTimer, 1000);

                                    function calculateScore() {
                                        // Disable the form inputs after submission
                                        const form = document.getElementById('quizForm');
                                        const inputs = form.getElementsByTagName('input');
                                        for (let i = 0; i < inputs.length; i++) {
                                            inputs[i].disabled = true;
                                        }

                                        const resultDiv = document.getElementById('result');
                                        const formData = new FormData(form);

                                        let score = 0;

                                        formData.forEach((value, key) => {
                                            if (key === 'question2') {
                                                // Check the answer for question 2
                                                if (parseInt(value) === 4) {
                                                    score++;
                                                }
                                            } else if (key === 'question3') {
                                                // Check the answer for question 3
                                                if (value === 'jupiter') {
                                                    score++;
                                                }
                                            }
                                        });

                                        resultDiv.innerHTML = `<h4>Your score is: ${score}/2</h4>`;
                                    }
                                </script>
                            </body>

                            </html>


                        </div>
                    </div>

                </div>

            </div>

        </div>


    </div>

</div>

@endsection