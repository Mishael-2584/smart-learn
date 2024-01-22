@extends('layouts.body')

@section('content')
<div class="main-content">
    <section class="section">
        @include('layouts.error')
        <div class="section-header">
            <h1>Set Quiz</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form id="quizForm" method="post">
                                @csrf
                                <input type="hidden" name="quiz_id" value="{{ $quiz->id }}">
                                <div id="questionContainer">
                                    <!-- Questions will be added here -->
                                </div>
                                <button type="button" id="addQuestionBtn" class="btn btn-primary">Add Question</button>
                                <input type="submit" value="Save Quiz" class="btn btn-success">
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
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
$(document).ready(function() {
    let questionNumber = 1; // Initialize question number

    $('#addQuestionBtn').click(function() {
        Swal.fire({
            title: 'Select question type',
            input: 'select',
            inputOptions: {
                'short': 'Short Answer',
                'mcq': 'Multiple Choice',
                'truefalse': 'True/False'
            },
            inputPlaceholder: 'Select question type',
            showCancelButton: true,
            inputValidator: (value) => {
                if (value) {
                    return null;
                } else {
                    return 'You need to select a question type';
                }
            }
        }).then((result) => {
            if (result.isConfirmed) {
                var questionType = result.value;
                addQuestionHtml(questionType);
            }
        });
    });

    function updateQuestionNumbers() {
           // Reset questionNumber to 1
           questionNumber = 1;

           // Select all the question groups and iterate over them
           $('.question-group').each(function() {
               // Update the label text to the current question number
               $(this).find('.question-label').text('Question ' + questionNumber);

               // Update the input names to the current question number
               $(this).find('input, select, textarea').each(function() {
                   var name = $(this).attr('name');
                   if(name) {
                       name = name.replace(/questions\[\d+\]/g, 'questions[' + questionNumber + ']'); // Replace index in names like questions[1][title]
                       $(this).attr('name', name);
                   }
               });
           
               // Increment questionNumber for the next iteration
               questionNumber++;
           });
    }       

    function addQuestionHtml(questionType) {
        var questionHtml = '<div class="question-group">'; // Start of question group div

            questionHtml += '<input type="hidden" name="questions[' + questionNumber + '][type]" value="' + questionType + '">';

        if (questionType === 'short') {
            questionHtml += '<div class="form-group">' +
                            '<label class="question-label">Question ' + questionNumber + ' (Short Answer)</label>' +
                            '<input type="text" name="questions[' + questionNumber + '][title]" class="form-control" required>' +
                            '<input type="text" name="questions[' + questionNumber + '][answer]" class="form-control" placeholder="Input Answer Here" required>' +
                            '</div>';
        } else if (questionType === 'mcq') {
            questionHtml += '<div class="form-group">' +
                            '<label class="question-label">Question ' + questionNumber + ' (Multiple Choice)</label>' +
                            '<input type="text" name="questions[' + questionNumber + '][title]" class="form-control" required>' +
                            '<div class="form-check">' +
                            '<input class="form-check-input" type="radio" name="questions[' + questionNumber + '][answer]" value="A" required> A' +
                            '<input type="text" name="questions[' + questionNumber + '][options][A]" class="form-control" required>' +
                            '</div>' +
                            '<div class="form-check">' +
                            '<input class="form-check-input" type="radio" name="questions[' + questionNumber + '][answer]" value="B" required> B' +
                            '<input type="text" name="questions[' + questionNumber + '][options][B]" class="form-control" required>' +
                            '</div>' +
                            '<div class="form-check">' +
                            '<input class="form-check-input" type="radio" name="questions[' + questionNumber + '][answer]" value="C" required> C' +
                            '<input type="text" name="questions[' + questionNumber + '][options][C]" class="form-control" required>' +
                            '</div>' +
                            '<div class="form-check">' +
                            '<input class="form-check-input" type="radio" name="questions[' + questionNumber + '][answer]" value="D" required> D' +
                            '<input type="text" name="questions[' + questionNumber + '][options][D]" class="form-control" required>' +
                            '</div>' +
                            // Add more options as needed
                            '</div>';
        } else if (questionType === 'truefalse') {
            questionHtml += '<div class="form-group">' +
                            '<label class="question-label">Question ' + questionNumber + ' (True/False)</label>' +
                            '<input type="text" name="questions[' + questionNumber + '][title]" class="form-control" required>' +
                            '<div class="form-check">' +
                            '<input class="form-check-input" type="radio" name="questions[' + questionNumber + '][answer]" value="true" required> True' +
                            '</div>' +
                            '<div class="form-check">' +
                            '<input class="form-check-input" type="radio" name="questions[' + questionNumber + '][answer]" value="false" required> False' +
                            '</div>' +
                            '</div>';
        }

            // Add a remove button for each question group
        questionHtml += '<button type="button" class="remove-question btn btn-danger">Remove Question</button>';
        questionHtml += '</div>'; // End of question group div

        if (questionHtml !== '') {
            $('#questionContainer').append(questionHtml);
            updateQuestionNumbers();;
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Invalid question type.'
            });
        }
    }

    // Event handler for removing a question
    $('#questionContainer').on('click', '.remove-question', function() {
        $(this).closest('.question-group').remove();
        updateQuestionNumbers(); // Call this function to update the question numbers
    });


    $('#quizForm').on('submit', function(e) {
        e.preventDefault();
    
        // Optionally, validate your form here
    
        var formData = $(this).serializeArray(); // Serialize the form data into array format
        var formDataObject = {}; // Prepare an object to hold the serialized data
    
        $.each(formData, function() {
            formDataObject[this.name] = this.value;
        });

        console.log(formDataObject);
    
        // Disable the submit button to prevent multiple submissions
        $(this).find(':submit').prop('disabled', true);
    
        // Perform an AJAX request to your server-side script
        $.ajax({
            url: '/lecturer/lecturerquizmanagement',
            type: 'POST',
            contentType: 'application/json', // Set content type to JSON if needed
            data: JSON.stringify(formDataObject), // Convert object to JSON string if needed
            success: function(response) {
                console.log(response);
                // Handle success
                Swal.fire({
                    icon: 'success',
                    title: 'Saved!',
                    text: 'Your quiz has been saved successfully',
                    confirmButtonText: 'Great!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = '/quizzes';
                    }
                });
            },
            error: function(xhr, status, error) {
                // Handle error
                Swal.fire({
                    icon: 'error',
                    title: 'Error saving quiz',
                    text: 'Something went wrong: ' + error
                });
            },
            complete: function() {
                // Re-enable the submit button after the AJAX call is complete
                $('#quizForm').find(':submit').prop('disabled', false);
            }
        });
    });
});
</script>
@endsection
