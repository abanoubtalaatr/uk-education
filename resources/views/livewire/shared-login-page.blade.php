<main>
    <!-- Start of section center-1 -->
    <section class="center-1 forgot-password">
      <div class="center-overlay">
        <div class="container">
          <div class="row d-flex justify-content-center align-items-center">
            <!-- Student Login -->
            <div class="col-md-5 p-none">
              <div class="margin-contain">
                <div class="card-login blue">
                  <h3>Login into your account as Student</h3>
                  <p>
                    Sed ut perspiciatis unde omnis iste natus error sit
                    voluptatem accusantium doloremque laudantium.
                  </p>
                  <ul class="sign-as">
                    <!-- Add any additional content here if needed -->
                  </ul>
                  <!-- Login Button for Students -->
                  <a href="{{ route('student-login') }}" class="btn btn-info mt-3">Login as Student</a>
                  <a href="{{ route('student-register') }}" class="btn btn-primary mt-3">Register as Student</a>
                </div>
              </div>
            </div>
            <!-- Tutor Login -->
            <div class="col-md-5 p-none mx-1">
              <div class="margin-contain">
                <div class="card-login blue">
                  <h3>Login into your account as Tutor</h3>
                  <p>
                    Sed ut perspiciatis unde omnis iste natus error sit
                    voluptatem accusantium doloremque laudantium.
                  </p>
                  <ul class="sign-as">
                    <!-- Add any additional content here if needed -->
                  </ul>
                  <!-- Login Button for Tutors -->
                  <a href="{{ route('tutor-login') }}"  class="btn btn-primary mt-3">Login as Tutor</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- End of section center-1 -->
  </main>
  