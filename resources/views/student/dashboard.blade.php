@extends('layouts.body')

@section('content')
<div class="main-content">
    <section class="section">
        @include('layouts.error')

        <div class="section-body">

            <!-- Page Banner START -->
            <div class="container px-0 mt-5">

                <!-- Main banner background image -->
                <div class="bg-blue  h-100 h-md-200 rounded-0 mt-4">
                    <img class="bg-top" src="{{ asset('codiepie/assets/img/bg/04.png') }}" alt="">
                </div>

                <div class="container mt-n4 align-top profile-card">
                    <div class="row">
                        <!-- Profile banner START -->
                        <div class="col-12">
                            <div class="card info-card card-body p-3" style="background: #ececec">
                                <div class="row d-flex justify-content-between">
                                    <!-- Avatar -->
                                    <div class="col-auto mt-4 mt-md-0">
                                        <div class="avatar avatar-xxl mt-n3">
                                                <svg class="avatar-img rounded-circle border border-primary border-3 shadow" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                                <path fill="#ececec" d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"/></svg>
                                        </div>
                                    </div>
                                    <!-- Profile info -->
                                    <div class="col d-md-flex justify-content-between align-items-center mt-4">
                                        <div>
                                            <h1 class="my-1 fs-4">{{$student->name}} <i
                                                    class="bi bi-patch-check-fill text-info small"></i></h1>
                                            <h5 class="my-1 fs-4 text-primary">STUDENT </h5>
                                        </div>
                                        <!-- Button -->
                                        <div class="d-flex align-items-center m-2 mt-md-0">
                                            <a href="#" class="btn btn-success mb-0">Info</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Profile banner END -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- Page Banner END -->

            <body>

                <div class="container dashboard mt-5 p-4 border">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card info-card bg-purple bg-opacity-15">
                                <i class="fas fa-users fa-3x text-light card-icon"></i>
                                <div class="text-right">
                                    <h4 class="card-title">Total Number of Lecturers</h4>
                                    <p class="card-total">@isset($lecturerCount)
                                        {{$lecturerCount}}
                                    @endisset</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card info-card bg-success bg-opacity-15">
                                <i class="fas fa-book fa-3x text-light card-icon"></i>
                                <div class="text-right">
                                    <h4 class="card-title">Total Number of Courses</h4>
                                    <p class="card-total">@isset($courseCount)
                                        {{$courseCount}}
                                    @endisset</p>
                                </div>
                            </div>
                        </div>

                        <!-- Quote Popup -->
                        <div class="col-md-12 h-100">
                            <div id="quotePopup" class=" quote-popup p-5">
                                <p id="quoteText" class="quote-text"></p>
                            </div>
                        </div>
                    </div>
                </div>




                <!-- Bootstrap JS and jQuery -->
                 <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script> 
                <!-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
                <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>  -->

                <script>
                    // Function to generate random quote
                    function getRandomQuote() {
                        const quotes = [
                            "The future belongs to those who believe in the beauty of their dreams. - Eleanor Roosevelt",
                            "Success is not final, failure is not fatal: It is the courage to continue that counts. - Winston Churchill",
                            "Believe you can and you're halfway there. - Theodore Roosevelt",
                            "It does not matter how slowly you go as long as you do not stop. - Confucius",
                            "You are never too old to set another goal or to dream a new dream. - C.S. Lewis",
                            "Life is what happens when you're busy making other plans. - John Lennon",
                            "The purpose of our lives is to be happy. - Dalai Lama",
                            "Get busy living or get busy dying. - Stephen King",
                            "You only live once, but if you do it right, once is enough. - Mae West",
                            "Many of life's failures are people who did not realize how close they were to success when they gave up. - Thomas A. Edison",
                            "The only impossible journey is the one you never begin. - Tony Robbins",
                            "In this life we cannot do great things. We can only do small things with great love. - Mother Teresa",
                            "The best way to predict your future is to create it. - Abraham Lincoln",
                            "You must be the change you wish to see in the world. - Mahatma Gandhi",
                            "I have learned over the years that when one's mind is made up, this diminishes fear. - Rosa Parks"
                        ];
                        const randomIndex = Math.floor(Math.random() * quotes.length);
                        return quotes[randomIndex];
                    }
                
                    function updateQuote() {
                        $('#quoteText').text(getRandomQuote());
                    }
                
                    // Use Blade syntax to get the session variable and convert it to a JavaScript boolean
                    var sessionStarted = {{ session('isAuthenticated', false) ? 'true' : 'false' }};

                    
                
                    $(document).ready(function() {
                        if (sessionStarted === true) {
                            updateQuote(); // Initial update
                            $('#quotePopup').fadeIn('slow'); // Show the popup immediately
                            setInterval(function () {
                                updateQuote(); // Update the quote every 5 seconds
                            }, 10000); // 10 seconds interval
                        }
                    });
                </script>


            </body>



        </div>
    </section>
</div>
@endsection