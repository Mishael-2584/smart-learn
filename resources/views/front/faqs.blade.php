@extends('front_layouts.app')

@section('content')
<section class="p-0 d-flex align-items-center position-relative overflow-hidden">
	
    <div class="container-fluid">
    <div class="container-fluid bg-light py-5">
  <div class="container">
    <h1 class="display-4 text-center">Frequently Asked Questions</h1>
    <p class="lead text-center mb-5">Find answers to common questions about our online learning platform.</p>

    <div class="accordion" id="faqsAccordion">
      <div class="card">
        <div class="card-header" id="headingOne">
          <h2 class="mb-0">
            <button class="btn btn-link collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
              What is Smart-Learn?
            </button>
          </h2>
        </div>
        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-bs-parent="#faqsAccordion">
          <div class="card-body">
            <p>Smart-Learn is an online learning platform that offers a wide range of courses in various subjects, from business and technology to art and personal development. We provide a flexible and convenient way for users to acquire new knowledge and skills at their own pace.</p>
          </div>
        </div>
      </div>
      <div class="card">
        <div class="card-header" id="headingTwo">
          <h2 class="mb-0">
            <button class="btn btn-link collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
              How do I create an account?
            </button>
          </h2>
        </div>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-bs-parent="#faqsAccordion">
          <div class="card-body">
            <p>Creating an account on Smart-Learn is easy! Simply visit our website and click on the 'Sign Up' button. You'll be prompted to enter your name, email address, and create a password. Once you've verified your email, you'll be ready to start exploring our courses.</p>
          </div>
        </div>
      </div>
      <div class="card">
        <div class="card-header" id="headingThree">
          <h2 class="mb-0">
            <button class="btn btn-link collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
              Do I need to pay for courses?
            </button>
          </h2>
        </div>
        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-bs-parent="#faqsAccordion">
          <div class="card-body">
            <p>We offer a mixture of free and paid courses however, as an online educational institution a regular chool fee is required. Contact us for more information for details.</p>
          </div>
        </div>
      </div>
      <div class="card">
        <div class="card-header" id="headingFour">
          <h2 class="mb-0">
            <button class="btn btn-link collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
              How can I get help with a course?
            </button>
          </h2>
        </div>
        <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-bs-parent="#faqsAccordion">
          <div class="card-body">
            <p>We offer several ways to get help with a course. You can access course discussions, ask questions to instructors, or search our extensive knowledge base.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
    </div>

    <style>
        .container-fluid {
  background-color: #f3f3f3;
}

.display-4 {
  font-family: sans-serif;
  font-weight: bold;
  /* color */
}
    </style>
</section>
@endsection

@section('scripts')
    <!-- Bootstrap JS -->
<script src="{{ asset('eduport/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>

<!-- Vendors -->
<script src="{{ asset('eduport/assets/vendor/tiny-slider/tiny-slider.js') }}"></script>
<script src="{{ asset('eduport/assets/vendor/glightbox/js/glightbox.js') }}"></script>
<script src="https://kit.fontawesome.com/201e2d289f.js" crossorigin="anonymous"></script>

<!-- Template Functions -->
{{-- <script src="{{ asset('eduport/assets/js/functions.js') }}"></script> --}}
@endsection

