<div class="header">
    <div class="container-fluid y-side-big">
      <div class="row">
        <div class="col-md-6">
          <div class="hero-box-info">
            <h1>ARS MEDICA</h1>
            <p class="w-100">
              Sed ut perspiciatis unde omnis istpoe natus error sit
              voluptatem accusantium doloremque eopsloi laudantium
            </p>
            <a href="{{route('all-mock-exams')}}" class="btn btn-next"
              >Mock Exam
            </a>
          </div>
        </div>

        <div class="col-md-6">
          <div class="hero-box-image">
            <img
              src="assets/images/man.png"
              alt=""
              class="img-fluid hero-image-responsive"
            />
          </div>
        </div>
        <!-- start find  -->
        @include('partials.main-search')
      </div>
    </div>
  </div>