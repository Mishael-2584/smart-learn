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
                                            <img class="avatar-img rounded-circle border border-primary border-3 shadow"
                                                src="{{ asset('/codiepie/assets/img/avatar/avatar-4.png') }}" alt="">
                                        </div>
                                    </div>
                                    <!-- Profile info -->
                                    <!-- Profile info -->
                                    <div class="col-md d-md-flex justify-content-between align-items-center mt-4">
                                        <div>
                                            <h1 class="my-1 fs-md-4">Billy Beaker <i
                                                    class="bi bi-patch-check-fill text-info small"></i></h1>
                                            <h5 class="my-1 fs-md-3 text-primary">Computer Science</h5>
                                        </div>
                                        <!-- Button -->
                                        <div class="d-flex align-items-center m-2 mt-md-0">
                                            <a href="#" class="btn btn-success btn-sm mb-0">Info</a>
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
                                <i class="fas fa-book fa-3x text-light card-icon"></i>
                                <div class="text-right">
                                    <h4 class="card-title">Total Courses</h4>
                                    <p class="card-total">500</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card info-card bg-success bg-opacity-15">
                                <i class="fas fa-tasks fas fa-tasksfa-3x text-light card-icon"></i>
                                <div class="text-right">
                                    <h4 class="card-title">Pending tasks</h4>
                                    <p class="card-total">10</p>
                                </div>
                            </div>
                        </div>

                        <!-- Quote Popup -->
                        <div class="col-md-12 h-100">
                            <div id="quotePopup" class=" quote-popup p-5">
                                <p id="quoteText" class="quote-text">Hey there. Welcome back!</p>
                            </div>
                        </div>
                    </div>
                </div>




                <!-- Bootstrap JS and jQuery -->
                <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script> 
                 <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
                <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>  -->

                <script>
                    // Function to generate random quote
                    function getRandomQuote() {
                        const quotes = [
                            "The future belongs to those who believe in the beauty of their dreams. - Eleanor Roosevelt",
                            "Success is not final, failure is not fatal: It is the courage to continue that counts. - Winston Churchill",
                            "Believe you can and you're halfway there. - Theodore Roosevelt",
                            "It does not matter how slowly you go as long as you do not stop. - Confucius",
                            "You are never too old to set another goal or to dream a new dream. - C.S. Lewis"
                        ];
                        const randomIndex = Math.floor(Math.random() * quotes.length);
                        return quotes[randomIndex];
                    }

                    function updateQuote() {
                        $('#quoteText').text(getRandomQuote());
                    }


                    // Display quote popup after 5 seconds (and every 30 seconds)
                    setTimeout(function () {
                        updateQuote();
                        document.getElementById('quoteText').textContent = getRandomQuote();
                        $('#quotePopup').fadeIn('slow');
                        setInterval(function () {
                            document.getElementById('quoteText').textContent = getRandomQuote();
                        }, 30000); // 30 seconds interval
                    }, 5000); // 5 seconds delay
                </script>


            </body>



        </div>
    </section>
</div>
@endsection