@extends('layout.structure')
@section('title')
    Contact
@endsection
@section('content')
<section class="contact-section">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mx-auto text-center">
          <h1 class="display-4">Contact DevJourney</h1>
          <p class="lead">We’d love to hear from you! Whether you have a question, feedback, or want to join our team as an author, feel free to reach out.</p>
        </div>
      </div>

      @if (session('status'))
        <div class="alert alert-success">
          {{ session('status') }}
        </div>
      @endif

      @if ($errors->any())
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
      @endif

      <!-- Contact Information -->
      <div class="row mt-5">
        <div class="col-lg-6 mx-auto text-center">
          <h2>Get in Touch</h2>
          <p>You can contact us via email or connect with us on social media. We typically respond within 24-48 hours.</p>
          <ul class="list-unstyled">
            <li><strong>Email:</strong> contact@devjourney.com</li>
            <li><strong>Twitter:</strong> <a href="https://twitter.com/devjourney" target="_blank">@devjourney</a></li>
            <li><strong>LinkedIn:</strong> <a href="https://linkedin.com/company/devjourney" target="_blank">DevJourney</a></li>
          </ul>
        </div>
      </div>

      <!-- Email Form for Upgrading to Author Role -->
      <div class="row mt-5">
        <div class="col-lg-8 mx-auto">
          <h2 class="text-center">Become an Author</h2>
          <p class="text-center">Interested in publishing posts on DevJourney? Fill out the form below, and we’ll get back to you with the next steps.</p>
          <form action="{{ route('upgrade-role-request') }}" method="POST">
            @csrf
            <div class="mb-3">
              <label for="name" class="form-label">Your Name</label>
              <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">Your Email</label>
              <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
              <label for="message" class="form-label">Why do you want to become an author?</label>
              <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
            </div>
            <div class="text-center">
              <button type="submit" class="btn btn-primary">Submit Request</button>
            </div>
          </form>
        </div>
      </div>

      <!-- FAQs (Optional) -->
      <div class="row mt-5 mb-2">
        <div class="col-lg-8 mx-auto">
          <h2 class="text-center">FAQs</h2>
          <div class="accordion" id="faqAccordion">
            <div class="accordion-item">
              <h3 class="accordion-header" id="faqHeadingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapseOne" aria-expanded="true" aria-controls="faqCollapseOne">
                  How long does it take to get approved as an author?
                </button>
              </h3>
              <div id="faqCollapseOne" class="accordion-collapse collapse show" aria-labelledby="faqHeadingOne" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                  Typically, it takes 1-2 business days for us to review your request and get back to you.
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h3 class="accordion-header" id="faqHeadingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapseTwo" aria-expanded="false" aria-controls="faqCollapseTwo">
                  What are the guidelines for publishing posts?
                </button>
              </h3>
              <div id="faqCollapseTwo" class="accordion-collapse collapse" aria-labelledby="faqHeadingTwo" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                  Posts should be original, well-researched, and relevant to software development or technology. We’ll provide detailed guidelines once you’re approved.
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

@endsection