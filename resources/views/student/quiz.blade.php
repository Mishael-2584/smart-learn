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
                                    <h2 class="mt-4">Take quiz</h2>
                                    <p id="timer" class="text-danger"></p>
                                    <form id="quizForm">
                                        <div class="form-group">
                                            <label for="question1">Question 1: Equatorial Guinea is an African country?</label>
                                            <select class="form-control" id="question1" name="question1">
                                                <option value="paris">Yes</option>
                                                <option value="berlin">No</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="question2">Question 2: What is 2 + 2?</label>
                                            <input type="number" class="form-control" id="question2" name="question2"
                                                required>
                                        </div>

                                        <div class="form-group">
                                            <label for="question3">Question 3: Which is the largest planet in our solar
                                                system?</label>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="question3"
                                                    id="jupiter" value="jupiter" required>
                                                <label class="form-check-label" for="jupiter">
                                                    Jupiter
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="question3" id="mars"
                                                    value="mars">
                                                <label class="form-check-label" for="mars">
                                                    Mars
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="question3" id="venus"
                                                    value="venus">
                                                <label class="form-check-label" for="venus">
                                                    Venus
                                                </label>
                                            </div>
                                        </div>

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
                                    const timerDuration = 180; // 3 minutes

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