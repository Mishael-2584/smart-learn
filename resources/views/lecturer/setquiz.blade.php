@extends('layouts.body')

@section('content')
<div class="main-content">
    <section class="section">
        @include('layouts.error')
        <div class="section-header">
            <h1>Quiz Detail</h1>
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
                                    
                                @isset($quiz->questions)
                                <?php $questionNo = 0; ?>
                                    @foreach ($data as $type => $questions)
                                    
                                        @foreach ($questions as $questionNumber => $question)
                                          <div class="question-group">
                                            <input type="hidden" name="questions[{{ $questionNo + 1 }}][type]" value="{{ $type }}">
                                            
                                            @if ($type === 'short')
                                              <div class="form-group">
                                                <label class="question-label">Question {{ $questionNo + 1 }} (Short Answer)</label>
                                                <input type="hidden" name="questions[{{ $questionNo + 1 }}][id]" value="{{ $question['id'] }}">
                                                <input type="text" name="questions[{{ $questionNo + 1 }}][title]" class="form-control" value="{{ $question['text'] }}" required>
                                                <input type="text" name="questions[{{ $questionNo + 1 }}][answer]" class="form-control" value="{{ $question['answer'] }}" required>
                                              </div>
                                            @elseif ($type === 'mcq')
                                              <div class="form-group">
                                                <label class="question-label">Question {{ $questionNo + 1 }} (Multiple Choice)</label>
                                                <input type="hidden" name="questions[{{ $questionNo + 1 }}][id]" value="{{ $question['id'] }}">
                                                <input type="text" name="questions[{{ $questionNo + 1 }}][title]" class="form-control" value="{{ $question['text'] }}" required>
                                                @foreach ($question['choices'] as $choiceLetter => $choice)
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="questions[{{ $questionNo + 1 }}][answer]" value="{{ chr(65 + $choiceLetter) }}" @if ($choice['written_response'] === $question['answer']) checked @endif required>
                                                        <label class="form-check-label">{{ $choice['option'] }}. </label> <input type="text" name="questions[{{ $questionNo + 1 }}][options][{{ $choice['option'] }}]" class="form-control" value="{{ $choice['written_response'] }}" required>
                                                    </div>
                                                @endforeach
                                              </div>
                                            @elseif ($type === 'truefalse')
                                              <div class="form-group">
                                                  <label class="question-label">Question {{ $questionNo + 1 }} (True/False)</label>
                                                  <input type="hidden" name="questions[{{ $questionNo + 1 }}][id]" value="{{ $question['id'] }}">
                                                  <input type="text" name="questions[{{ $questionNo + 1 }}][title]" class="form-control" value="{{ $question['text'] }}" required>
                                                  <div class="form-check">
                                                      <input class="form-check-input" type="radio" name="questions[{{ $questionNo + 1  }}][answer]" value="True" @if ($question['answer'] === 'True') checked @endif required>
                                                      <label class="form-check-label">True</label>
                                                  </div>
                                                  <div class="form-check">
                                                      <input class="form-check-input" type="radio" name="questions[{{ $questionNo + 1 }}][answer]" value="False" @if ($question['answer'] === 'False') checked @endif required>
                                                      <label class="form-check-label">False</label>
                                                  </div>
                                              </div>
                                            @endif                      
                                            <button type="button" class="remove-question btn btn-danger">Remove Question</button>
                                            <?php $questionNo++; ?>
                                        </div> 
                                        @endforeach
                                    @endforeach       
                                @endisset

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
                            '<input class="form-check-input" type="radio" name="questions[' + questionNumber + '][answer]" value="True" required> True' +
                            '</div>' +
                            '<div class="form-check">' +
                            '<input class="form-check-input" type="radio" name="questions[' + questionNumber + '][answer]" value="False" required> False' +
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
    
        // Disable the submit button to prevent multiple submissions
        $(this).find(':submit').prop('disabled', true);
    
        var formData = $(this).serializeArray();
        var formDataObject = {
            _token: '',
            quiz_id: '',
            questions: []
        };
        // Iterate over each item in the serialized array and construct the object
        $.each(formData, function(index, item) {
            // Match the name to extract indices and keys for questions
            var match = item.name.match(/^questions\[(\d+)\]\[(\w+)\]$/);
            var matchOptions = item.name.match(/^questions\[(\d+)\]\[options\]\[(\w+)\]$/);

            if (item.name === '_token') {
                formDataObject._token = item.value;
            } else if (item.name === 'quiz_id') {
                formDataObject.quiz_id = item.value;
            } else if (match) {
                var idx = parseInt(match[1], 10) - 1; // Arrays are zero-indexed
                var questionKey = match[2];
                formDataObject.questions[idx] = formDataObject.questions[idx] || {};
            
                // Extract question ID if present
                var questionIdMatch = item.name.match(/^questions\[(\d+)\]\[id\]$/);
                if (questionIdMatch) {
                    formDataObject.questions[idx].id = item.value;
                } else {
                    // If not ID, handle other question data
                    formDataObject.questions[idx][questionKey] = item.value;
                }
            } else if (matchOptions) {
                var idx = parseInt(matchOptions[1], 10) - 1; // Arrays are zero-indexed
                var optionKey = matchOptions[2];
                formDataObject.questions[idx] = formDataObject.questions[idx] || {};
                formDataObject.questions[idx].options = formDataObject.questions[idx].options || {};
                formDataObject.questions[idx].options[optionKey] = item.value;
            }
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
                        window.location.href = '/lecturer/lectureropencourse/' + response.lcId + '#submissions';
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
